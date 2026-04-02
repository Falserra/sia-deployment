<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getProducts(){
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function add(Request $request){

        $rules = [
            'product_name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ];

        $this->validate($request, $rules);

        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }

    public function show($id){

        $product = Product::findOrFail($id);

        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => $product
        ]);
    }

    public function delete($id){

        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'product_name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }
}