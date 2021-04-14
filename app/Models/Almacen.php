<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table='almacen';
    protected $fillname = ['fecha',  'descripcion','temperatura','humedad'];
}
