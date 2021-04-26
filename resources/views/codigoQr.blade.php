
@extends('welcome')
@section("codigo")
<div class="container  col-md-8 col-md-offset-2">

@if($codigo)
    <h1>Código {{$tipo}}: <span class="text-warning">{{$codigo}}</span></h1>
    <div id="codigoQR" style="width:500px" class="title text-center container bg-danger text-white m-b-md" >

        {!!QrCode::size(300)->generate($codigo)!!}
        <p>{{$cargaT->nombre}} - {{$cargaT->direccion}}</p>

    </div> 
    <button class="btn btn-primary" onclick="imprimir('codigoQR')">Imprimir</button>

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
 
@else
<h1>No existe Codigo</h1>
@endif
</div>
@if ($tipo == 'vina')
    <a href="{{route('vina')}}">Volver</a>
@elseif ($tipo == 'cosecha')
    <a href="{{route('cosecha')}}">Volver</a>
@else
    <a href="{{route('intro')}}"
@endif
@stop