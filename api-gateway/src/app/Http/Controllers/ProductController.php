<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    public function index()
    {
        $response = Http::acceptJson()->get(env('CATALOG_SERVICE_API') . '/product');
        return $response->json();
    }

    public function store(Request $request)
    {
        $response = Http::acceptJson()->post(env('CATALOG_SERVICE_API') . '/product/store', $request->all());
        return $response->json();
    }

    public function update(Request $request, $id)
    {
        $response = Http::acceptJson()->patch(env('CATALOG_SERVICE_API') . '/product/' . $id . '/update', $request->all());
        return $response->json();
    }

    public function delete($id)
    {
        $response = Http::acceptJson()->delete(env('CATALOG_SERVICE_API') . '/product/' . $id . '/delete');
        return $response->json();
    }
}
