<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Venda::query();

        if ($request->has('id_venda')) {
            $query->where('id_venda', $request->id_venda);
        }

        return $query->get();
    }
}

