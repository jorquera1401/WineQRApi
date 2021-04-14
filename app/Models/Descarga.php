<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    protected $table='descarga';
    protected $fillname = ['fecha', 'descripcion','distancia'];
}
