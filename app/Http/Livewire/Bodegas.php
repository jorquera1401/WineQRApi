<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bodega;
use App\Models\Almacen;
class Bodegas extends Component{

    public $bodegas;
    public $almacenData;
    public $temperaturaB, $humedadB, $fechaB;
    
    public $tPromedioA,$hPromedioA;
    public $tPromedioB, $hPromedioB, $totalB, $tMaxB, $hMaxB, $tMinB, $hMinB;

    public $data;
    public $verDetalle = false;
   
    public function render()
    {
        $this->temperaturaPromedioA = Almacen::sum('humedad');
        $this->almacenData =Almacen::all();
        $this->temperaturaPromedioA = $this->temperaturaPromedioA/count($this->almacenData);
        $this->bodegas = Bodega::all();
        
        $this->calcularEstadisticaBodega();
        $this->verData();

        return view('livewire.bodega');
    }

    private function calcularEstadisticaBodega(){

        $datosBodega = Bodega::sum('temperatura');
        $filas = Bodega::all();
        $this->tPromedioB = $datosBodega / count($filas);
        $datosBodega = Bodega::sum('humedad');
        $this->hPromedioB = $datosBodega/ count($filas);
        $this->totalB = count($filas);
        $this->tMaxB = collect($filas)->max('temperatura');
        $this->tMinB = collect($filas)->min('temperatura');
        $this->hMaxB = collect($filas)->max('humedad');
        $this->hMinB = collect($filas)->min('humedad');

    }

    public function visualizar($id){
        $record = Bodega::findOrFail($id);
        $this->verDetalle = true;
        $this->temperaturaB = $record->temperatura;
        $this->humedadB = $record->humedad;
        $this->fechaB  =$record->fecha;
    }

    public function cerrar(){
        $this->verDetalle=false;
    }

    public function verData(){
        $bodega = Bodega::all();

        $data = [];

        foreach($bodega as $fila){
            $data['label'][]=$fila->fecha;
            $data['data'][]=(float) $fila->temperatura;

        }
        $this->data= json_encode($data);


    }

}
