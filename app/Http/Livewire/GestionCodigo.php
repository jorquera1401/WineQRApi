<?php

namespace App\Http\Livewire;

use App\Models\Carga;
use Livewire\Component;

class GestionCodigo extends Component
{
    public $cargaData;
    public $hola;
    public function render()
    {
        $this->verCargas();

        return view('livewire.gestion-codigo');
    }

    public function verCargas(){

        $filas  = Carga::all();
        $objeto = [];
        foreach($filas as $fila){    
            $data['id'] = $fila->id;
            $data['fecha']= substr($fila->fecha,0,11);
            $data['hora']= substr($fila->fecha,11);
            $data['peso'] = (float)$fila->peso;
            $data['hash_entrada'] = $fila->hash_entrada;
            $data['hash_salida']=$fila->hash_salida;
            $objeto[]= $data;
        }
        $this->cargaData=json_encode($objeto);
    }
}
