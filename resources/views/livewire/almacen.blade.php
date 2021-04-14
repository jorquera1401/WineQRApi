<div>

    <h1>Datos Almacen</h1>
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">||</th>
                <th class="px-4 py-2">Temperatura</th>
                <th class="px-4 py-2">Humedad</th>
                <th class="px-4 py-2">Fecha</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($almacenData as $item)
        
                <tr class="text-center">
                    <td class="border px-4 py-2">{{$item->id}}</td>
                    <td class="border px-4 py-2">{{$item->temperatura}}</td>
                    <td class="border px-4 py-2">{{$item->humedad}}</td>
                    <td class="border px-4 py-2">{{$item->fecha}}</td>  
                    <td class="border px-4 py-2">
                        <button class="px-2 py-1 bg-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded">Editar</button>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="4" class="py-3 italic">No Hay dato de Almacen</td>
                </tr>
                
            @endforelse
        </tbody>
    </table>

    <div>
        <p>Maxima temperatura Almacen: {{$temperaturaPromedioA}}</p> 
    </div>

</div>