<div class="container">
    <h1>Datos Bodega</h1>
    @if($verDetalle)
        @include('livewire.detalleBodega')
    @endif
    <div class="row">
        <table class="table-auto w-full col-12 col-sm-6 col-md-8">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Temperatura</th>
                    <th class="px-4 py-2">Humedad</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Hora</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bodegas as $item)
               
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{$item->id}}</td>
                        <td class="border px-4 py-2">{{$item->temperatura}}</td>
                        <td class="border px-4 py-2">{{$item->humedad}}</td>
                        <td class="border px-4 py-2">{{substr($item->fecha,0,11)}}</td>
                        <td class="border px-4 py-2">{{substr($item->fecha,11)}}</td>  
                        <td class="border px-4 py-2">
                            <button wire:click="visualizar({{$item->id}})" class="px-2 py-1 bg-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded">Editar</button>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4" class="py-3 italic">No Hay Datos de Bodega</td>
                    </tr>
                    
                @endforelse
            </tbody>
        </table>
        <div class="col-6 col-md-4 bg-primary text-white">
            <h3>Resumen</h3>
            <p>Temperatura Promedio: {{$tPromedioB}}°C</p>
            <p>Temperatura Maxima : {{$tMaxB}}°C</p>
            <p>Temperatura Minima : {{$tMinB}}°C</p>
            
            <p>Humedad Promedio : {{$hPromedioB}}%</p>
            <p>Humedad Máxima : {{$hMaxB}}%</p>
            <p>Humedad Minima : {{$hMinB}}%</p>
            <p>Cantidad de Datos: {{$totalB}}</p>
        </div>
    </div>

    <div>
        <h4>Gráfico</h4>
        <canvas id="pie-chart"></canvas>
    </div>

    <script>
        $(function(){
            var cData = JSON.parse('<?php echo $data;?>');
            var ctx= $("#pie-chart");

             var data = {
                 labels: cData.label,
                 datasets:[
                    {
                        label:  "Temperatura",
                        data: cData.data,
                        backgroundColor:[
                            
                            "#CDA776",

                        ],
                        borderColor:[
                            "#CB252B",
                        ],
                        borderWidth : [1,1,1,1,1,1,1]
                    }

                 ]
             };
            
             var options = {
                 responsive : true,
                 title:{
                     display:true,
                     position:"top",
                     text:"Registros de Temperatura - Bodega",
                     fontSize:18,
                     fontColor:"#111"
                 },
                 legend:{
                     display : true,
                     position:"bottom",
                     labels:{
                         fontColor:"#333",
                         fontSize:16
                     }
                 }
             };

             var grafico_temperatura = new Chart(ctx,{
                 type:"line",
                 data:data,
                 options:options
             });

        })

    </script>
    
    @include('livewire.almacen')

</div>

