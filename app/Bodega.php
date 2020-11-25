<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table='bodega';
    protected $fillname = ['fecha', 'temperatura', 'humedad', 'descripcion'];
}
