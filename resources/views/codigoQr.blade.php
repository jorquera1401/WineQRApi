
@extends('welcome')
@section("codigo")
<div class="container card col-md-8 col-md-offset-2">

@if($codigo)
    <div class="card-header">
        <h1>Código {{$tipo}}: <span class="text-warning">{{$codigo}}</span></h1>
    </div>
    
    <div id="codigoQR" style="width:500px" class="title text-center container card-body  text-black m-b-md" >

        {!!QrCode::size(300)->generate($codigo)!!}
        <p>Código :  {{$codigo}}</p>
        <p>{{$cargaT->nombre}} - {{$cargaT->direccion}}</p>
        
    </div> 
    <button class="btn btn-primary" onclick="imprimir('codigoQR')">Imprimir</button>

    <script>
        function imprimir(imagen){
            var contenido = document.getElementById(imagen).innerHTML;
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