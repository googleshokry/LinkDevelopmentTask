<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    public function index()
    {
        $response = Http::acceptJson()->get('http://host.docker.internal:81/api/product');
        return $response->json();
    }

    public function store()
    {
        // todo
    }

    public function update()
    {
        // todo
    }

    public function delete()
    {
        // todo
    }
}
