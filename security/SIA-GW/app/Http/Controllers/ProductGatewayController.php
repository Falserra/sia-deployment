<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductGatewayController extends Controller
{
    protected $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        return $this->productService->getProducts();
    }

    public function store(Request $request)
    {
        return $this->productService->createProduct($request->all());
    }

    public function show($id)
    {
        return $this->productService->showProduct($id);
    }

    public function update(Request $request, $id)
    {
        return $this->productService->updateProduct($id, $request->all());
    }

    public function delete($id)
    {
        return $this->productService->deleteProduct($id);
    }
}