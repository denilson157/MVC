<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\ClientesController;
use Tests\TestCase;

class ClientesControllerTest extends TestCase
{
    private $cliente;


    public function __construct()
    {
        parent::__construct();

        $this->cliente = new ClientesController;
    }


    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testCheckCliente()
    // {

    //     $this->assertFalse($this->cliente->checkCliente(1));

    //     $this->assertJson($this->cliente->checkCliente(1));
    // }
    
    public function testGet()
    {
        // $this->markTestSkipped();
        $cliente = $this->cliente->get(1);
        $this->assertNotEquals('Denílson', $cliente->nome);
    }
}
