<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'details' => 'required|array',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'details' => $request->details,
        ]);

        return response()->json(['message' => 'Product saved successfully', 'product' => $product]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        // Or where
//        $product = Product::where('details->CPU', 'Intel i7')->first();
        return response()->json($product);
    }
}
