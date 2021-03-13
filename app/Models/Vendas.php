<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'cliente_id',
        'funcionario_id',
        'valor',
        'data_venda'
    ];

    protected $table = 'Vendas';

    public function clientes()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }
}
