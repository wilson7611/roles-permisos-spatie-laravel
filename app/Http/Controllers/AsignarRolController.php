<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AsignarRolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('gestion.user.role', compact('users', 'roles'));
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
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);

        $roles = Role::all();

        return view('gestion.roles.userRol', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Buscar el usuario
            $user = User::findOrFail($id); // Utiliza findOrFail para lanzar una excepción si no se encuentra
    
            // Sincronizar roles
            $user->roles()->sync($request->roles);
    
            // Redirigir con mensaje de éxito
            return redirect()
                ->route('asignar-rol', $user)
                ->with('success', 'Roles asignados correctamente al usuario.');
    
        } catch (Exception $e) {
            // Redirigir con mensaje de error
            return redirect()
                ->route('asignar-rol', $id)
                ->with('error', 'Ocurrió un error al asignar los roles: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
    }
}
