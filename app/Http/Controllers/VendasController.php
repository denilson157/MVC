<?php

namespace App\Http\Controllers;

use App\Models\Vendas;

class VendasController extends Controller
{
    public function listar()
    {
        $vendas = Vendas::all();

        return view('venda.index')->with('vendas', $vendas);
    }
}
