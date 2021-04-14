<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bodega;
use App\Models\Almacen;
class Bodegas extends Component{

    public $bodegas, $temperatura, $humedad, $descripcion, $fecha;
    public $almacenData, $temperaturaA, $humedadA;
    public $temperaturaPromedioA,$humedadPromedioA;
    public $updateMode = false;
   
    public function render()
    {
        $this->temperaturaPromedioA = Almacen::sum('humedad');
        $this->almacenData =Almacen::all();
        $this->temperaturaPromedioA = $this->temperaturaPromedioA/count($this->almacenData);
        $this->bodegas = Bodega::all();
        return view('livewire.bodega');
    }

}
