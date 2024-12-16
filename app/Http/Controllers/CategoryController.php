<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('gestion.categories.index', compact('categories'));
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

        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            Category::create($data);
    
            return redirect()->route('categories.index')->with('success', 'Categoria creado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar el categoria: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:80',
            'description' => 'required|max:180',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Asegúrate de asignar el valor de 'status' si lo deseas (aunque el valor por defecto en la BD es 1)
            $data = $request->all();
            $data['status'] = 1;  // Asigna manualmente el valor de 'status' si es necesario
    
            $category->update($data);
    
            return redirect()->route('categories.index')->with('success', 'Categoria actualizado con éxito');
            //return 'correcto';
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al actualizar la Categoria: ' . $e->getMessage()])->withInput();
            //return 'incorrecto';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            if($category){

                $category->delete();
            }
            return redirect()->route('categories.index')->with('success', 'Categoria Eliminado Exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Error al eliminar Categoria', $e->getMessage());
        }
    }
    public function estado($id)
    {
        $category = Category::find($id);
        if ($category->status == 1) {
            Category::where('id', $category->id)
                ->update([
                    'status' => 0
                ]);
            return redirect()->route('categories.index')->with('success', 'Categoria Deshabilitado');
        } else {
            Category::where('id', $category->id)
                ->update([
                    'status' => 1
                ]);
            return redirect()->route('categories.index')->with('success', 'Categoria Restaurado Correctamente');
        }

        //return redirect()->route('supliers.index')->with('success', $message);
    }
}
