<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class SeederFuncionario extends Seeder
{
    public function run()
    {
        Funcionario::create([
            'nome' => 'Denílson Pereira',
            'endereco' => 'Rua Limeira de Morais',
            'email' => 'dpereira@outlook.com',
            'telefone' => '998040124'
        ]);
    }
}
