<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'telefone'
    ];

    protected $table = 'Funcionario';

    /*
    mudar chave primaria 
    protected $primaryKey = 'nome_pk';


    se nao quer auto increment 
    public $increment = false;

    definir tipo
    protected $keyType = 'string';

    tirar timestamp 
    public $timestamps = false;
    */
}
