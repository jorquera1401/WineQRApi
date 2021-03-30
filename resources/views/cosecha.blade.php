@extends('welcome')
@section('contentCosecha')

<div class="container col-md-8 col-md-offset-2">
    <div class="panel-heading">
        <h2>Proceso</h2>
    </div>
@if (!$cosechas)
    <div> No existen registros de cosecha</div>
@else 
    <h1>Cosechas</h1>
    <form method="POST" action="{{route('cosecha_generate')}}">
        @csrf 
    <select name="cosecha_item">
    @foreach ($cosechas as $item)
        <option  value="{{$item->hash_salida}}">{{$item->fecha}} {{$item->hash_entrada}}</option>
    @endforeach
    </select>
    <input type="submit" value="Generar"/>
    </form>
@endif
</div>
@stop