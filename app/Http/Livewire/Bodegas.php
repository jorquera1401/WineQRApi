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

    public $dataBodega;
    public $dataAlmacen;
    public $verDetalle = false;
   
    /**
     * Se ve en en el navegador
     */
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
    /**
     * Calcula datos estadisticos en el dataset de Bodega
     */
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

    /**
     * Visualizar el detalle de una fila de bodega
     */
    public function visualizar($id){
        $record = Bodega::findOrFail($id);
        $this->verDetalle = true;
        $this->temperaturaB = $record->temperatura;
        $this->humedadB = $record->humedad;
        $this->fechaB  =$record->fecha;
    }
    /**
     * Cierra la ventana de detalle 
     */
    public function cerrar(){
        $this->verDetalle=false;
    }

    /**
     * Carga los datos de Bodega y Almacen en un dataset para poder ser visto en gráficos en el navegador
     */
    public function verData(){
        $bodega = Bodega::all();
        $almacen = Almacen::all();
        $data = [];

        foreach($bodega as $fila){
            $data['label'][]= substr($fila->fecha,11);
            $data['fecha'][]=substr($fila->fecha,0,11);
            $data['data'][]=(float) $fila->temperatura;
            $data['humedad'][]=(float) $fila->humedad;
        }
        $this->dataBodega= json_encode($data);
        
        $data =[];
        foreach($almacen as $fila){
            $data['label'][]=substr($fila->fecha,11);
            $data['fecha'][]=substr($fila->fecha,0,11);
            $data['temperaturaData'][]=(float) $fila->temperatura;
            $data['humedadData'][]=(float) $fila->humedad;
        }
        $this->dataAlmacen = json_encode($data);

    }
 

}
