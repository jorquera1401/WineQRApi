@extends('welcome')
@section('Carga')

<div class="container col-md-8 col-md-offset-2">
    <div class="panel-heading">
        <h2>Seccion de Carga</h2>
    </div>

@if (!$cargas)
    <div> <p>No existen registro de carga</p></div>
@else 
    <h1>Carga</h1>

    <form method="POST" action="{{route('carga_generate')}}">
        @csrf
        <select name="carga_item">
            @foreach($cargas as $item)
                <option value="{{$item->hash_salida}}">{{$item->fecha}} {{$item->hash_entrada}}</option>
            @endforeach
        </select>
        <input type="submit" value="Generar"/>
    </form>

@endif

    <div class="flex  justify-center mx-auto p-4 max-w-4x1 rounded shadow mb-4">
        <h2>Espacio para datos desde LiveWire</h2>
        @livewire('bodegas')
    </div>
</div>


 @stop