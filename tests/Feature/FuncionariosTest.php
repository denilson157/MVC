<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Funcionario;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuncionariosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $func = Funcionario::create(
            [
                'nome' => 'Vanessa',
                'email' => 'Vanessa@outlook.com',
                'endereco' => 'Rua Senac',
                'telefone' => 54477664
            ]
        );

        $this->assertDatabaseHas('funcionario', ['nome' => 'Vanessa']);
    }
}
