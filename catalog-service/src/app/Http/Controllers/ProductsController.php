<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\services\ProductService;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * @param ProductService $product
     */
    public $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = $this->product->index();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //
        $data = $this->product->store($request->validated());
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
        $data = $this->product->update($request->validated(), $product);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $data = $this->product->destroy($product);
        return response()->json(['message' => $data]);
    }
}
