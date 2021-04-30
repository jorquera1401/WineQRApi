@extends('welcome')
@section('presentacion')
<div class="container-fluid contenido">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div clasS="carousel-inner">
            
            <div class="card bg-dark espacio carousel-item active">
                <div class="vignette">
                    <img class="card-img imagen" src="img/intro/presentacion.jpg" style="width: 100%" alt="imagen">
                </div>
                
                <div class="card-img-overlay ">
                    <div class="padding-bottom fondo-text text-white">
                        <h1 class="card-title ">Sistema de Trazabilidad de Viñedos usando IoT</h1>
                        <p class="card-text">Permite capturar datos y generar un seguimientos de los procesos durante las etapas de produccion de materia prima del vino</p>
                    
                    </div>
                        
                </div>
            </div>

            <div class="card bg-dark espacio carousel-item">
                <div class="vignette">
                    <img class="card-img imagen" src="img/intro/predio.jpg" style="width: 100%" alt="imagen">
                </div>
                
                <div class="card-img-overlay ">
                    <div class="padding-bottom fondo-text text-white">
                        <h1 class="card-title ">Captura de Datos Predio y Campo</h1>
                        <p class="card-text">Captura de datos generales del viñedo y del campo donde está la fruta</p>
                    
                    </div>
                        
                </div>
            </div>
            
            <div class="card bg-dark espacio carousel-item">
                <div class="vignette">
                    <img class="card-img imagen" src="img/intro/cosecha.jpg" style="width: 100%" alt="imagen">
                </div>
                
                <div class="card-img-overlay ">
                    <div class="padding-bottom fondo-text text-white">
                        <h1 class="card-title ">Captura de Datos de Cosecha</h1>
                        <p class="card-text">Captura las condiciones en que es cosechada la Uva</p>
                    
                    </div>
                        
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        
        </div>
    </div>

 

    
</div>


@stop 