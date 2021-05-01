<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Clientes extends Model
{
    use HasFactory, Notifiable;
    use HasRoles;

    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'email',
        'nascimento'
    ];

    protected $table = 'Clientes';

    public function vendas()
    {
        return $this->hasMany(Vendas::class, 'cliente_id');
    }
}
