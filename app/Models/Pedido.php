<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_nome',
        'email',
        'produto',
        'quantidade',
        'key_idempotencia'
    ];
}
