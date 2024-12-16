<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('gestion.products.index', compact('products', 'categories'));
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
            'name' => ['required', 'string', 'max:55'],
            'description' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ]);
    
        // Retorna errores de validación, si los hay
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        try {
            // Manejo de la subida de imagen, si existe
            $imgPath = null;
            if ($request->hasFile('image')) {
                $imgPath = $request->file('image')->storeAs(
                    'products', 
                    time() . '_' . $request->file('image')->getClientOriginalName(), 
                    'public'
                );
            }
    
            // Crear el producto
            Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'stock' => $request->input('stock'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'image' => $imgPath,
            ]);
    
            // Redirige con un mensaje de éxito
            return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
    
        } catch (Exception $e) {
            // Redirige con un mensaje de error
            return redirect()
                ->route('products.index') // Cambiar a la ruta correcta
                ->with('error', 'Ocurrió un error al crear el producto: ' . $e->getMessage());
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // Validación de los datos recibidos
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:55'],
        'description' => ['required', 'string', 'max:255'],
        'stock' => ['required', 'integer', 'min:0'],
        'price' => ['required', 'numeric', 'min:0'],
        'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'category_id' => ['required', 'integer', 'exists:categories,id'],
    ]);

    // Retorna errores de validación, si los hay
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    try {
        // Encontrar el producto existente
        $product = Product::findOrFail($id);

        // Manejo de la subida de nueva imagen, si existe
        $imgPath = $product->image; // Mantener la imagen actual
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }

            // Subir la nueva imagen
            $imgPath = $request->file('image')->storeAs(
                'products', 
                time() . '_' . $request->file('image')->getClientOriginalName(), 
                'public'
            );
        }

        // Actualizar el producto
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'image' => $imgPath,
        ]);

        // Redirige con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente');

    } catch (Exception $e) {
        // Redirige con un mensaje de error
        return redirect()
            ->route('products.index')
            ->with('error', 'Ocurrió un error al actualizar el producto: ' . $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Encontrar el producto
            $product = Product::findOrFail($id);
    
            // Eliminar la imagen asociada, si existe
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }
    
            // Eliminar el producto
            $product->delete();
    
            // Redirige con un mensaje de éxito
            return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
    
        } catch (Exception $e) {
            // Redirige con un mensaje de error
            return redirect()
                ->route('products.index')
                ->with('error', 'Ocurrió un error al eliminar el producto: ' . $e->getMessage());
        }
    }
    public function estado($id)
    {
        $product = Product::find($id);
        if ($product->status == 1) {
            Product::where('id', $product->id)
                ->update([
                    'status' => 0
                ]);
            return redirect()->route('products.index')->with('success', 'Producto Deshabilitado');
        } else {
            Product::where('id', $product->id)
                ->update([
                    'status' => 1
                ]);
            return redirect()->route('products.index')->with('success', 'Producto Restaurado Correctamente');
        }

        //return redirect()->route('supliers.index')->with('success', $message);
    }
}
