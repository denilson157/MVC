<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendas;

class VendasController extends Controller
{
    public function index()
    {
        return Vendas::all();
    }


    public function store(Request $request)
    {
        $json = $request->getContent();

        return Vendas::create(json_decode($json, JSON_OBJECT_AS_ARRAY));
    }


    public function show($id)
    {
        $venda = Vendas::find($id);
        if ($venda) {
            return $venda;
        } else
            return json_encode([$id => "não existe"]);
    }

    public function update(Request $request, $id)
    {
        $venda = Vendas::find($id);

        if ($venda) {

            $json = $request->getContent();
            $vendaAtualizar = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $venda->data_venda = $vendaAtualizar['data_venda'];
            $venda->valor = $vendaAtualizar['valor'];
            $venda->cliente_id = $vendaAtualizar['cliente_id'];
            $venda->funcionario_id = $vendaAtualizar['funcionario_id'];

            $retorno = $venda->update() ? [$id => 'Atualizado'] : [$id => 'Erro'];
        } else
            $retorno = json_encode([$id => "não existe"]);


        return $retorno;
    }

    public function destroy($id)
    {
        $venda = Vendas::find($id);

        if (!empty($venda)) {
            $retorno = $venda->delete() ? [$id => 'Apagado'] : [$id => 'Erro'];
        } else {
            $retorno = [$id => 'Venda não encontrada'];
        }

        return json_encode($retorno);
    }
}
