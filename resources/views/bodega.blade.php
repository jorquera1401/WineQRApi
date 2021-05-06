@extends('welcome')
@section('Bodega')

 


<div class="flex card justify-center mx-auto p-4 max-w-4x1 rounded shadow ">
    @if(!$datos)
    <div class="card-body">
        <h1>No existen datos de bodega</h1>
    
    </div>
        
    @else
    <div class="card-header"><h2>Datos desde los procesos de Bodega y Almacen de Fruta</h2></div>
    <div class="card-body">
        
        @if($tabla)   
            {{--  Se dirige a la ruta app/Http/Livewire/Bodegas.php  --}}
            @livewire('bodegas')

        @else 
            {{--  Se dirige a la ruta app/Http/Livewire/Graficos.php  --}}
            @livewire('graficos')
        @endif
    </div>
    @endif    
</div>

@stop