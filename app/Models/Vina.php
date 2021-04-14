<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vina extends Model
{
    protected $table='vina';
    protected $fillname = ['nombre', 'direccion', 'descripcion', 'hash'];
}
