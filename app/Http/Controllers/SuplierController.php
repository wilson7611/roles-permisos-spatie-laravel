<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supliers = Suplier::all();

        return view('gestion.supliers.index', compact('supliers'));
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
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'nit' => 'required',
            'name' => 'required|max:80',
            'email' => 'required|email',
            'phone' => 'required|max:18',
            'address' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            Suplier::create($data);
    
            return redirect()->route('supliers.index')->with('success', 'Proveedor creado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar el proveedor: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suplier $suplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suplier $suplier)
    {
        $validator = Validator::make($request->all(), [
            'nit' => 'required',
            'name' => 'required|max:80',
            'email' => 'required|email',
            'phone' => 'required|max:18',
            'address' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            $suplier->update($data);
    
            return redirect()->route('supliers.index')->with('success', 'Proveedor actualizado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al actualizar el proveedor: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suplier $suplier)
    {
        try {
            if($suplier){

                $suplier->delete();
            }
            return redirect()->route('supliers.index')->with('success', 'Proveedor Eliminado Exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('supliers.index')->with('error', 'Error al eliminar Proveedor', $e->getMessage());
        }

    }
    public function estado($id)
    {
        $suplier = Suplier::find($id);
        if ($suplier->status == 1) {
            Suplier::where('id', $suplier->id)
                ->update([
                    'status' => 0
                ]);
            return redirect()->route('supliers.index')->with('success', 'Proveedor Deshabilitado');
        } else {
            Suplier::where('id', $suplier->id)
                ->update([
                    'status' => 1
                ]);
            return redirect()->route('supliers.index')->with('success', 'Proveedor Restaurado Correctamente');
        }

        //return redirect()->route('supliers.index')->with('success', $message);
    }
}
