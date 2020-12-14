
@extends('welcome')
@section("codigo")
 <div class="container col-md-8 col-md-offset-2">
    <h1> este es {{$hola}} <a href="{{$codigo}}" target="_blank">{{$codigo}}</a></h1>
<div class="title m-b-md">

    {!!QrCode::size(300)->generate($codigo)!!}
</div> 
</div>
            <a href="{{route('vina')}}">Volver</a>
@stop