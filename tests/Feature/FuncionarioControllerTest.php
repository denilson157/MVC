<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\FuncionarioController;
use Tests\TestCase;

class FuncionarioControllerTest extends TestCase
{
    private $funcionario;

    public function __construct()
    {
        parent::__construct();

        $this->funcionario = new FuncionarioController;
    }


    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCheckFuncionario()
    {
        $this->assertJson($this->funcionario->checkFuncionario(1));
    }

    public function testGet()
    {
        $funcionario = $this->funcionario->get(1);
        $this->assertEquals('Denílson Pereira', $funcionario->nome);
        $this->assertEquals(998040124, $funcionario->telefone);


        $funcionarios = $this->funcionario->getAll();

        foreach ($funcionarios as $func) {
            $this->assertTrue(!empty($func->telefone));
        }

        $funcionario2 = $this->funcionario->get(2);
        $this->assertNotEquals('Denílson Pereira', $funcionario2->nome);
    }
}
