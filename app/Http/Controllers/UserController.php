<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::all();

        return view('gestion.user.index', compact('users', 'roles'));
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
        // Validación de los datos recibidos
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ci' => ['nullable', 'string', 'max:20'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    
        // Retorna errores de validación, si los hay
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput(); // Regresa los datos para que el formulario no se vacíe
        }
    
        try {
            // Manejo de la subida de imagen, si existe
            $imgPath = null;
            if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('users', 'public'); // Guarda la imagen en storage/app/public/users
            }
    
            // Crear el usuario
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'ci' => $request->input('ci'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'img' => $imgPath, // Ruta de la imagen, si existe
            ]);
    
            // Redirige con un mensaje de éxito
            return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    
        } catch (Exception $e) {
            // Redirige con un mensaje de error
            return redirect()
                ->route('user.index')
                ->with('error', 'Ocurrió un error al crear el usuario: ' . $e->getMessage());
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
