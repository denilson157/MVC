<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecriaTabelaVendas extends Migration
{
    public function up()
    {
        Schema::create('Vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_venda');
            $table->double('valor', 10, 2);
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('Clientes')->onDelete('cascade');

            $table->bigInteger('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')->references('id')->on('Funcionario')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Vendas');
    }
}
