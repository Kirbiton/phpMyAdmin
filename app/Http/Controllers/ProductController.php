<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product ->update($request->all());
        
        return response()->json($product);
    }    

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null,204)
    }
}
