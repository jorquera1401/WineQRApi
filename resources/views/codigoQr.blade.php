
@extends('welcome')
@section("codigo")
<div class="container col-md-8 col-md-offset-2">
    <h1> Proceso :  {{$tipo}} <a href="{{$codigo}}" target="_blank">{{$codigo}}</a></h1>
    <div id="codigoQR" class="title m-b-md">

        {!!QrCode::size(300)->generate($codigo)!!}
        <p>Hola mundo</p>
    </div> 
    <button class="button" onclick="imprimir('codigoQR')">Imprimir</button>

    <script>
        function imprimir(imagen){
            console.log(imagen)
            var contenido = document.getElementById(imagen).innerHTML;
            console.log(contenido);
            var contenidoOriginal = document.body.innerHTML;
            document.body.innerHTML=contenido;
            window.print();
            document.body.innerHTML = contenidoOriginal;
        
        }
    </script>
</div>


@if ($tipo == 'vina')
    <a href="{{route('vina')}}">Volver</a>
@elseif ($tipo == 'cosecha')
    <a href="{{route('cosecha')}}">Volver</a>
@else
    <a href="{{route('intro')}}"
@endif
@stop