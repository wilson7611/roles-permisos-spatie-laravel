<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can: Ver Cliente')->only('index');
    }
    public function index()
    {
        $clients = Client::all();

        return view('gestion.clients.index', compact('clients'));
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
        $validator = Validator::make($request->all(),[
            'ci' => 'required|unique:clients,ci,except,id',
            'name' => 'required|max:80',
            'email' => 'required|email|unique:clients,email,except,id',
            'phone' => 'required|max:18',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Client::create($request->all());
            return redirect()->route('clients.index')->with('success', 'Cliente creado con éxito');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar el cliente: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        try {
            // Validar la solicitud
            $validatedData = $request->validate([
                'ci' => 'required|max:12',
                'name' => 'required|string|max:255|unique:roles,name,' . $client->id,
                'email' => 'required|email|max:50',
                'phone' => 'nullable|max:18',
                'address' => 'nullable|max:50',
            ]);
    
            // Actualizar el rol con asignación masiva
            $client->update($validatedData);
    
            // Redirigir con mensaje de éxito
            return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
        } catch (\Exception $e) {
            // Manejo de errores
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el Client: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $client = Client::find($id);
            if ($client) {
                $client->delete();
            }
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado con exito');
        } catch (\Exception $e) {
            return redirect()->route('clients.index')->with('error', 'Error al eliminar Cliente', $e->getMessage());
        }
        
    }
}
