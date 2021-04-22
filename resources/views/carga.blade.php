@extends('welcome')
@section('Carga')

<div class="container col-md-8 col-md-offset-2">
    <div class="panel-heading">
        <h2>Gestion de Cargas de Fruta</h2>
    </div>

@if (!$cargas)
    <div> <p>No existen registro de carga</p></div>
@else 
    <h1>Carga</h1>

    {{--  <form method="POST" action="{{route('carga_generate')}}">
        @csrf
        <select name="carga_item">
            @foreach($cargas as $item)
                <option value="{{$item->hash_salida}}">{{$item->fecha}} {{$item->hash_entrada}}</option>
            @endforeach
        </select>
        <input type="submit" value="Generar"/>
    </form>  --}}


    

@endif

</div>

@livewire('gestion-codigo');

 @stop