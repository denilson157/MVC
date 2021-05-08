<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Fornecedores;
use Spatie\Permission\Models\Role;
use DB;
use Hash;


class FornecedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:fornecedor-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:fornecedor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fornecedor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:fornecedor-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $qtd_pagina = 5;
        $data = Fornecedores::orderBy('id', 'DESC')->paginate($qtd_pagina);

        return view('fornecedores.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $qtd_pagina);
    }


    public function create()
    {
        return view('fornecedores.create');
    }


    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required',
                'cnpj' => 'required'
            ]
        );

        $input = $request->all();

        Fornecedores::create($input);

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor criado com sucesso');
    }


    public function show($id)
    {
        $fornecedor = Fornecedores::find($id);

        return view('fornecedores.show', compact('fornecedor'));
    }


    public function edit($id)
    {
        $fornecedor = Fornecedores::find($id);

        return view('fornecedores.edit', compact('fornecedor'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required',
                'cnpj' => 'required',
            ]
        );

        $input = $request->all();

        $fornecedor = Fornecedores::find($id);

        $fornecedor->update($input);

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso');
    }


    public function destroy($id)
    {
        Fornecedores::find($id)->delete();

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor removido com sucesso');
    }
}
