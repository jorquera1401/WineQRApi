<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $table='carga';
    protected $fillname = ['fecha', 'peso', 'descripcion', 'hash_entrada', 'hash_salida'];
}
