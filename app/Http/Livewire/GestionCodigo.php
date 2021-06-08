<?php

namespace App\Http\Livewire;

use App\Models\Carga;
use Livewire\Component;

class GestionCodigo extends Component
{
    public $cargaData;
    public $hola;
    public $totalPeso, $promedioPeso;
    public $primeraCaptura, $ultimaCaptura;
    public $ver;
    public function render()
    {
        $this->verCargas();
        $this->verEstadistica();
        return view('livewire.gestion-codigo');
    }

    /**
     * Carga los datos de la tabla para visualizar el administrador
     */
    public function verCargas(){

        $filas  = Carga::all();
        if($filas->count()>0){
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
            $this->ver = true;
        }else{
            $this->ver = false;
        }
    }

    /**
     * Carga las estadisticas para visualizar en el resumen
     */
    public function verEstadistica(){
        $carga = Carga::all();
        $primero= Carga::oldest()->first();
        $ultimo = Carga::latest()->first();
        $this->primeraCaptura = $primero->fecha;
        $this->ultimaCaptura = $ultimo->fecha;
        $this->totalPeso = (float) collect($carga)->sum('peso');
        $this->promedioPeso = (float) round(collect($carga)->avg('peso'),2);


    }
}
