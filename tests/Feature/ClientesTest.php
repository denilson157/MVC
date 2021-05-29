<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientesTest extends TestCase
{

    use DatabaseTransactions;

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $cliente = Clientes::create(
            [
                'nome' => 'Vanessa',
                'email' => 'Vanessa@outlook.com',
                'endereco' => 'Rua Senac',
                'nascimento' => '2021-01-31'
            ]
        );

        $this->assertDatabaseHas('Clientes', ['nome' => 'Vanessa']);
    }
}
