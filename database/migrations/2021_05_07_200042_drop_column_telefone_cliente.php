<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnTelefoneCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Clientes', function (Blueprint $table) {

            $table->dropColumn('telefone');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Clientes', function (Blueprint $table) {

            $table->bigInteger('telefone');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        //
    }
}
