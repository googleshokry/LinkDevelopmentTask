<?php

namespace App\Http\services;

use App\Models\Product;

class ProductService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Product::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        //
        return Product::create([
            'name' => $request['name'],
            'color' => $request['color'],
            'weight' => $request['weight'],
            'price' => $request['price'],
            'description' => $request['description']
        ]);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update($request, Product $product)
    {
        //
        $product->update([
            'name' => $request['name'],
            'color' => $request['color'],
            'weight' => $request['weight'],
            'price' => $request['price'],
            'description' => $request['description']
        ]);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return 'This Action Success';

    }
}
