<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::all();
    }

    public function show($id)
    {
        return Produto::findOrFail($id);
    }
}

