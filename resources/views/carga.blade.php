@extends('welcome')
@section('Carga')

<div class="container card ">
    <div class="panel-heading card-header">
        <h2>Gestion de Cargas de Fruta</h2>
    </div>

@if($cargas->isEmpty())
    <div class="card-body"> <p>No existen registro de carga</p></div>
@else 
    <div class="card-body">
   
    
     @livewire('gestion-codigo');
    </div>
@endif

</div>



 @stop