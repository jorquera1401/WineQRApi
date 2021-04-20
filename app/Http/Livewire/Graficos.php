<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bodega;
use App\Models\Almacen;

class Graficos extends Component
{
    public $dataAlmacen;
    public $dataBodega;
    public function render()
    { 
        $this->verData();
        return view('livewire.graficos');
    }

      /**
     * Carga los datos de Bodega y Almacen en un dataset para poder ser visto en gráficos en el navegador
     */
    private function verData(){
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
