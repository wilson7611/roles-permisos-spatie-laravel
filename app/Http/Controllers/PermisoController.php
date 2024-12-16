<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::all();

        return view('gestion.permisos.index', compact('permisos'));
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
    public function store(Request $request, Permission $permiso)
    {
        
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:permissions,name,' . $permiso->id,
            ]);
            $permiso->name = $validatedData['name'];
            $permiso->save();
            return redirect()->route('permisos.index')->with('success', 'Permiso creado con éxito');            
        }catch(Exception $e){
            return redirect()->route('permisos.index')->with('error', 'No se pudo crear el permiso', $e->getMessage());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permiso)
    {
        try {
            // Validar la solicitud
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name,' . $permiso->id,
            ]);
    
            // Actualizar el rol con asignación masiva
            $permiso->update($validatedData);
    
            // Redirigir con mensaje de éxito
            return redirect()->route('permisos.index')->with('success', 'Permiso actualizado correctamente.');
        } catch (\Exception $e) {
            // Manejo de errores
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el rol: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $permiso = Permission::find($id);
            $permiso->delete();
            return redirect()->route('permisos.index')->with('success', 'Rol Eliminado Exitosamente');
        }catch(Exception $e){
            return redirect()->route('permisos.index')->with('error', 'Erro al eliminar Rol', $e->getMessage());
        }
    }
}
