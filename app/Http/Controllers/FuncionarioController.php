<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {
        return Funcionario::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = $request->getContent();

        return Funcionario::create(json_decode($json, JSON_OBJECT_AS_ARRAY));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        if ($funcionario) {
            return $funcionario;
        } else
            return json_encode([$id => "não existe"]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);

        if ($funcionario) {
            $json = $request->getContent();
            $funcAtualizar = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $funcionario->nome = $funcAtualizar['nome'];
            $funcionario->email = $funcAtualizar['email'];
            $funcionario->telefone = $funcAtualizar['telefone'];
            $funcionario->endereco = $funcAtualizar['endereco'];

            $retorno = $funcionario->update() ? [$id => 'Atualizado'] : [$id => 'Erro'];
        } else
            $retorno = json_encode([$id => "não existe"]);


        return $retorno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);

        if (!empty($funcionario)) {
            $retorno = $funcionario->delete() ? [$id => 'Apagado'] : [$id => 'Erro'];
        } else {
            $retorno = [$id => 'Funcionário nao encontrado'];
        }

        return json_encode($retorno);
    }

    public function checkFuncionario($id)
    {
        $funcionario = Funcionario::find($id);

        return $funcionario ?? false;
    }

    public function get($id)
    {
        $funcionario = Funcionario::find($id);

        return $funcionario;
    }

    public function getAll()
    {
        $funcionarios = Funcionario::all();

        return $funcionarios;
    }
}
