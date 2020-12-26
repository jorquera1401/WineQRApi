<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{
    //
    protected $table='cosecha';
    protected $fillname = ['fecha', 'temperatura', 'humedad', 'descripcion', 'hash_entrada', 'hash_salida'];
}
