
@extends('welcome')
@section("codigo")
 <div class="container col-md-8 col-md-offset-2">
    <h1> Proceso :  {{$tipo}} <a href="{{$codigo}}" target="_blank">{{$codigo}}</a></h1>
<div class="title m-b-md">

    {!!QrCode::size(300)->generate($codigo)!!}
</div> 
</div>
@if ($tipo == 'vina')
    <a href="{{route('vina')}}">Volver</a>
@elseif ($tipo == 'cosecha')
    <a href="{{route('cosecha')}}">Volver</a>
@else
    <a href="{{route('intro')}}"
@endif
@stop