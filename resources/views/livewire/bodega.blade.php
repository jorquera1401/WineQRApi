<div >
    <h1>Datos Bodega</h1>
    @if($verDetalle)
        @include('livewire.detalleBodega')
    @endif

    <div class="row ">
        <table id="tabla_bodega" class="table table-hover table-condensed">
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
        </table>
  
       
    </div>
    <div class="row container">
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
 
    </div>

    <script>
        var datosBodega= JSON.parse('<?php echo $dataBodega ?>');
        var detalleAlmacen;
        $(document).ready(function(){
            
            console.log("Bodega: ",datosBodega);
        })

        

        $("#tabla_bodega").DataTable({
            data: datosBodega, 
            responsive:true,
            columns:[
                
                {data:"id"},
                {data:"temperatura"},
                {data:"humedad"},
                {data:"fecha"},
                {data:"hora"},
                {
                    data : null,
                    render:function(data,type,fila,meta){
                         return '<button class="btn btn-success verBodega" data-id='+fila.id+'>Ver</button>';
                    }
                }
            ],
            "fnDrawCallback":function(){
                $(".verBodega").unbind("click").click(function(){
                    let id = $(this).data("id");
                    console.log(id);
            
                });
            }
        });
    </script>

    @include('livewire.almacen')

</div>

