 @extends('welcome')
 @section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel-heading">
            <h2>Viñas</h2>
        </div>
    @if (!$vinas)
        <div> No hay vinas Registradas</div>
    @else 
        <h1>Si hay</h1>
        <form method="POST" action="{{route('prueba')}}">
            @csrf
        <input type="text" name="texto"/>
        <select name="nombre">
        @foreach ($vinas as $item)
            <option  value="{{$item->nombre}}">{{$item->nombre}}"</option>
        @endforeach
        </select>
        <input type="submit" value="Guardar"/>
        </form>
        <div class="title m-b-md">
            {!!QrCode::size(300)->generate("sandi")!!}
        </div> 
        @yield("prueba")
    @endif
       
    </div> 
@stop