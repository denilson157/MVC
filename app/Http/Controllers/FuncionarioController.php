<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;


class FuncionarioController extends Controller
{
    public function index()
    {
        return view('funcionario.index')->with('funcionarios', Funcionario::all());
    }
}
