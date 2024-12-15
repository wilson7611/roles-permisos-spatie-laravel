<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
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
    public function edit( $id)
    {
        // Obtén al usuario que quieres editar
    $user = User::findOrFail($id);

    // Obtén todos los roles disponibles
    $roles = Role::all();

    // Pasar el usuario y los roles a la vista
    return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id); // Encuentra al usuario por ID

    // Validación de los datos (ajustar según necesidades)
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'ci' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'password' => 'nullable|confirmed|min:8', // Contraseña confirmada y opcional
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
    ]);

    // Actualización de datos básicos
    $user->name = $request->input('name');
    $user->ci = $request->input('ci');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->address = $request->input('address');
    $user->fecha_nacimiento = $request->input('fecha_nacimiento');

    // Si se proporciona una nueva contraseña, la actualizamos
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    // Manejo de imagen
    if ($request->hasFile('img')) {
        // Eliminar la imagen anterior si existe
        if ($user->img && file_exists(public_path('storage/' . $user->img))) {
            unlink(public_path('storage/' . $user->img));
        }

        // Subir la nueva imagen
        $imageName = $request->file('img')->store('users', 'public'); // Se guarda en el disco 'public'
        $user->img = $imageName; // Asignamos el nombre de la imagen al usuario
    }

    // Actualización de roles
    if ($request->has('roles')) {
        $user->roles()->sync($request->input('roles')); // Sincronizar los roles
    }

    // Guardamos los cambios
    $user->save();

    return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Buscar el usuario
            $user = User::findOrFail($id);
    
            // Eliminar usuario
            $user->delete();
    
            // Retornar respuesta de éxito
            return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
        } catch (\Exception $e) {
            // Registrar el error en los logs
            Log::error('Error al eliminar usuario: ' . $e->getMessage());
    
            // Retornar con mensaje de error
            return redirect()->route('users.index')->with('error', 'Hubo un error al eliminar al usuario.');
        }
    }
}
