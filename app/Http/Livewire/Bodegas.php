<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bodega;
use App\Models\Almacen;
use App\Models\Descarga;
class Bodegas extends Component{

    public $bodegas;
    public $almacenData;
    public $temperaturaB, $humedadB, $fechaB;
    public $datosAlmacen;
    
    public $tPromedioB, $hPromedioB, $totalB, $tMaxB, $hMaxB, $tMinB, $hMinB;
    public $tPromedioA,$hPromedioA, $totalA, $tMaxA,$hMaxA,$tMinA,$hMinA;
    public $totalD, $promedioD, $maxD, $minD;


    public $dataBodega;
    public $dataAlmacen;
    public $dataDescarga;
    public $verDetalle = false;
    public $verBodega=true;
    public $verAlmacen=true;
    public $verDescarga=true; 
    /**
     * Se ve en en el navegador
     */
    public function render()
    {
        // $this->temperaturaPromedioA = Almacen::sum('humedad');
        // $this->almacenData =Almacen::all();
        // if($this->almacenData->count()>0){
        //     $this->temperaturaPromedioA = $this->temperaturaPromedioA/count($this->almacenData);
        // }
        // $this->bodegas = Bodega::all();
        
        $this->calcularEstadisticaBodega();
        $this->calcularEstadisticaAlmacen();
        $this->calcularEstadisticaDescarga();
        $this->verData();

        return view('livewire.bodega');
    }
    /**
     * Calcula datos estadisticos en el dataset de Bodega
     */
    private function calcularEstadisticaBodega(){

        $datosBodega = Bodega::sum('temperatura');
        $filas = Bodega::all();
        if($filas->count()>0){
            $this->tPromedioB = round($datosBodega / count($filas),2);
            $datosBodega = Bodega::sum('humedad');
            $this->hPromedioB = round($datosBodega/ count($filas),2);
            $this->totalB = count($filas);
            $this->tMaxB = collect($filas)->max('temperatura');
            $this->tMinB = collect($filas)->min('temperatura');
            $this->hMaxB = collect($filas)->max('humedad');
            $this->hMinB = collect($filas)->min('humedad');
        }else{
            $this->verBodega = false;
        }
    }
    private function calcularEstadisticaAlmacen(){
        $datosAlmacen = Almacen::sum('temperatura');

        $filas = Almacen::all();
        if($filas->count()>0){
            $this->totalA = collect($filas)->count();
            $this->tPromedioA = round(collect($filas)->avg('temperatura'),2);
            $this->hPromedioA = round(collect($filas)->avg("humedad"),2);
            $this->tMaxA = collect($filas)->max('temperatura');
            $this->hMaxA = collect($filas)->max('humedad');
            $this->tMinA = collect($filas)->min('temperatura');
            $this->hMinA = collect($filas)->min('humedad');
        }else{
            $this->verAlmacen = false;
        }
    }

    private function calcularEstadisticaDescarga(){
        $filas = Descarga::all();
        if($filas->count()>0){
            $this->totalD = collect($filas)->count();
            $this->promedioD = round(collect($filas)->avg('distancia')/100,2);
            $this->maxD = collect($filas)->max('distancia');
            $this->minD = collect($filas)->min('distancia');
        }else{
            $this->verDescarga=false;
        }
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

    public function visualizarAlmacen($id){
        $record = Almacen::findOrFail($id);
        $data['id']=$record->id;
        $data['temperatura']=$record->temperatura;
        $data['humedad']=$record->humedad;
        $data['fecha']=substr($record->fecha,0,11);
        $data['hora']=substr($record->fecha,11);
        return json_encode($data);

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
        $descarga = Descarga::all();
        $this->datosModelo = Almacen::all();

        $data = [];
        $object= [];
        foreach($bodega as $fila){
            $data['id']=$fila->id;
            $data['hora']= substr($fila->fecha,11);
            $data['fecha']=substr($fila->fecha,0,11);
            $data['temperatura']=(float) $fila->temperatura;
            $data['humedad']=(float) $fila->humedad;
            $object[]=$data;
        }
        $this->dataBodega= json_encode($object);
        
        $data =[];
        $object  =[];
        foreach($almacen as $fila){
            $data['id']=$fila->id;
            $data['hora']=substr($fila->fecha,11);
            $data['fecha']=substr($fila->fecha,0,11);
            $data['temperatura']=(float) $fila->temperatura;
            $data['humedad']=(float) $fila->humedad;
      
            $object[]=$data;
        }
        $this->dataAlmacen = json_encode($object);

        $data = [];
        $object = [];
        foreach($descarga as $fila){
            $data['id'] = $fila->id;
            $data['hora'] = substr($fila->fecha,11);
            $data['fecha'] = substr($fila->fecha,0,11);
            $data['distancia']= (float)$fila->distancia/100;
            $object[]=$data;
        }

        $this->dataDescarga = json_encode($object);
        
    }
 

}
