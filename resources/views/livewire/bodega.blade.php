<div >
    <h1>Datos Bodega</h1>
    @if($verDetalle)
        @include('livewire.detalleBodega')
    @endif

    <div>
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

    <div class="container row text-white">
        <div class="col-6 col-md-4 bg-primary  ">
            <h3>Resumen Datos Bodega</h3>
         
            <p>Cantidad de Datos: {{$totalB}}</p>
        </div>
        <div class="col bg-success">
            <h3>Promedio</h3>
            <p>Temperatura Promedio: {{$tPromedioB}}°C</p>
            <p>Humedad Promedio : {{$hPromedioB}}%</p>
        </div>
        <div class="col bg-danger  ">
            <h3>Máxima</h3>
            <p>Temperatura Maxima : {{$tMaxB}}°C</p>
            <p>Humedad Máxima : {{$hMaxB}}%</p>
            
        </div>
        <div class="col bg-secondary ">
            <h3>Minima</h3>
            <p>Temperatura Minima : {{$tMinB}}°C</p>    
            <p>Humedad Minima : {{$hMinB}}%</p>
        
        </div>    

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

    @include('livewire.descarga')

</&div>

