
    <h1> este es {{$hola}} {{$codigo}}</h1>
<div class="title m-b-md">

    {!!QrCode::size(300)->generate($codigo)!!}
</div> 