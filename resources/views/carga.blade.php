@extends('welcome')
@section('Carga')

<div class="container col-md-8 col-md-offset-2">
    <div class="panel-heading">
        <h2>Gestion de Cargas de Fruta</h2>
    </div>

@if($cargas->isEmpty())
    <div> <p>No existen registro de carga</p></div>
@else 
    <h1>Carga</h1>
    
     @livewire('gestion-codigo');
@endif

</div>



 @stop