<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();

        return view('gestion.staff.index', compact('staffs'));
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
            'ci' => 'required|max:12',
            'name' => 'required|max:80',
            'phone' => 'required|max:18',
            'room' => 'required|max:50',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            Staff::create($data);
    
            return redirect()->route('staff.index')->with('success', 'Personal creado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar el personal: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validator = Validator::make($request->all(), [
            'ci' => 'required',
            'name' => 'required|max:80',
            'phone' => 'required|max:18',
            'room' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            $staff->update($data);
    
            return redirect()->route('staff.index')->with('success', 'Personal actualizado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al actualizar el Personal: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        try {
            if($staff){

                $staff->delete();
            }
            return redirect()->route('staff.index')->with('success', 'Personal Eliminado Exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('staff.index')->with('error', 'Error al eliminar Personal', $e->getMessage());
        }
    }
    public function estado($id)
    {
        $staff = Staff::find($id);
        if ($staff->status == 1) {
            Staff::where('id', $staff->id)
                ->update([
                    'status' => 0
                ]);
            return redirect()->route('staff.index')->with('success', 'Personal Deshabilitado');
        } else {
            Staff::where('id', $staff->id)
                ->update([
                    'status' => 1
                ]);
            return redirect()->route('staff.index')->with('success', 'Personal Restaurado Correctamente');
        }

        //return redirect()->route('supliers.index')->with('success', $message);
    }
}
