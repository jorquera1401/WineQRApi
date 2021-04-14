<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bodega;

class Graficos extends Component
{
    public $datosHumedadB;
    public function render()
    {

        return view('livewire.graficos');
    }
}
