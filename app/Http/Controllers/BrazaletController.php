<?php

namespace App\Http\Controllers;

use App\Models\Brazalet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BrazaletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brazalets = Brazalet::all();

        return view('gestion.brazalets.index', compact('brazalets'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:80',
            'description' => 'required|max:180',
            'price_brazalete' => 'required|numeric',

        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            Brazalet::create($data);
    
            return redirect()->route('brazalets.index')->with('success', 'brazalet creado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar el brazalet: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brazalet $brazalet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brazalet $brazalet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brazalet $brazalet)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:80',
            'description' => 'required|max:180',
            'price_brazalete'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            $brazalet->update($data);
    
            return redirect()->route('brazalets.index')->with('success', 'brazalet actualizado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al actualizar la brazalet: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brazalet $brazalet)
    {
        try {
            if($brazalet){

                $brazalet->delete();
            }
            return redirect()->route('brazalets.index')->with('success', 'brazalet Eliminado Exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('brazalets.index')->with('error', 'Error al eliminar brazalet', $e->getMessage());
        }
    }
    public function estado($id)
    {
        $brazalet = Brazalet::find($id);
        if ($brazalet->status == 1) {
            Brazalet::where('id', $brazalet->id)
                ->update([
                    'status' => 0
                ]);
            return redirect()->route('brazalets.index')->with('success', 'brazalet Deshabilitado');
        } else {
            Brazalet::where('id', $brazalet->id)
                ->update([
                    'status' => 1
                ]);
            return redirect()->route('brazalets.index')->with('success', 'brazalet Restaurado Correctamente');
        }

        //return redirect()->route('supliers.index')->with('success', $message);
    }
}
