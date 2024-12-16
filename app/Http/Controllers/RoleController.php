<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Input\Input;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permisos =Permission::all();
        return view('gestion.roles.index', compact('roles', 'permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Role $role)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            ]);
            $role->name = $validatedData['name'];
            $role->save();
            return redirect()->route('roles.index')->with('success', 'Permiso creado con éxito');            
        }catch(Exception $e){
            return redirect()->route('roles.index')->with('error', 'No se pudo crear el permiso', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //$role = Role::find($id);
        $permisos =Permission::all();
        return view('gestion.roles.edit', compact('role', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        try {
            $role->permissions()->sync($request->permisos);

            return redirect()->route('roles.index', $role)->with('success', 'Permisos Actualizados exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('roles.index', $role)->with('error', 'Error al Actualizar permisos', $e->getMessage());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $role = Role::find($id);
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Rol Eliminado Exitosamente');
        }catch(Exception $e){
            return redirect()->route('roles.index')->with('error', 'Erro al eliminar Rol', $e->getMessage());
        }
    }
   public function updaterol(Request $request, Role $role)
   {
    try {
        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        // Actualizar el rol con asignación masiva
        $role->update($validatedData);

        // Sincronizar permisos (si se envían)
        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        } else {
            $role->permissions()->detach(); // Eliminar permisos si no se envía ninguno
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    } catch (\Exception $e) {
        // Manejo de errores
        return redirect()->back()->with('error', 'Ocurrió un error al actualizar el rol: ' . $e->getMessage());
    }
   }
}
