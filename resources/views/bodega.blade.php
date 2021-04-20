@extends('welcome')
@section('Bodega')

 

<div class="flex  justify-center mx-auto p-4 max-w-4x1 rounded shadow ">
    <h2>Datos desde los procesos de Bodega y Almacen de Fruta</h2>
    @if($tabla)   
        {{--  Se dirige a la ruta app/Http/Livewire/Bodegas.php  --}}
        @livewire('bodegas')

    @else 
        {{--  Se dirige a la ruta app/Http/Livewire/Graficos.php  --}}
        @livewire('graficos')
    @endif
    
</div>

@stop