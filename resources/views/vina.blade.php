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
        <select name="nombre">
        @foreach ($vinas as $item)
            <option  value="{{$item->hash}}">{{$item->nombre}}"</option>
        @endforeach
        </select>
        <input type="submit" value="Generar"/>
        </form>

        <table id="tabla">
            <tr>
            <th>Item</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <tr>
            @foreach ($vinas as $item)
            <tr>
                <td></td>
                <td>{{$item->nombre}}</td>
                <td><a href="{{route('prueba')}}">{{$item->hash}}</a></td>
            </tr> 
            @endforeach

        </table>
        

        <script>
            $(document).ready(function(){
                console.log("pesca")
                $("#tabla").DataTable();
            })
                </script>
    @endif
       
    </div> 
@stop

