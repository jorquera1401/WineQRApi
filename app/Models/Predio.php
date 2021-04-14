<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    protected $table='predio';
    protected $fillname = ['nombre', 'locacion', 'tipo','descripcion','predio', 'hash'];
}
