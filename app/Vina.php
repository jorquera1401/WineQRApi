<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vina extends Model
{
    protected $table='vina';
    protected $fillname = ['nombre', 'direccion', 'descripcion', 'hash'];
}
