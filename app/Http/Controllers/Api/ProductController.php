<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Product::all(),
            'message' => 'Success'
        ]);
    }

    public function detail($id)
    {
        return response()->json([
            'status' => true,
            'data' => Product::find($id),
            'message' => 'Success'
        ]);
    }

    public function delete($id)
    {
        return response()->json([
            'status' => true,
            'data' => Product::destroy($id),
            'message' => 'Success'
        ]);
    }

    public function store(Request $request)
{
    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');
    $product->code = $request->input('code');
    $product->save();

    return response()->json([
        'status' => true,
        'data' => $product,
        'message' => 'Produk berhasil disimpan'
    ]);
}

public function update(Request $request, $id)
{
    $product = Product::find($id);
    
    if (!$product) {
        return response()->json([
            'status' => false,
            'message' => 'Produk tidak ditemukan'
        ]);
    }
    
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');
    $product->code = $request->input('code');
    $product->save();

    return response()->json([
        'status' => true,
        'data' => $product,
        'message' => 'Produk berhasil diperbarui'
    ]);
}
}

    // public function update(Request $request, $id)
    // {
    //     $product = Product::find($id);

    //     if (!$product) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Product not found'
    //         ]);
    //     }

    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required|numeric',
    //         'stock' => 'required|integer',
    //         'code' => 'required|unique:products,code,' . $id,
    //     ]);

    //     $product->name = $request->name;
    //     $product->price = $request->price;
    //     $product->stock = $request->stock;
    //     $product->code = $request->code;

    //     $updated = $product->save();

    //     if ($updated) {
    //         return response()->json([
    //             'status' => true,
    //             'data' => $product,
    //             'message' => 'Product updated successfully'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Failed to update product'
    //         ]);
        
    

