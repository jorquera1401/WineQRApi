<div id="padre" >

    <div class="card">
        <div class="card-header" data-toggle="collapse" data-target="#bodega-expand">
            <button class="btn btn-link"  aria-expanded="true" aria-controls="#bodega-expand">
                <h2><i class="fas fa-industry"></i> Informe de Bodega </h2> 
            </button>
        </div>
    </div>

    <div id="bodega-expand" class="collapse " aria-labelledby="headingOne" data-parent="#padre">
        
        
        @if($verDetalle)
            @include('livewire.detalleBodega')
        @endif

        <div class="card">
            <div class="card-header header-resumen"><h5><b>Resumen</b></h5></div>
            <div class="card-body row">
                <div class="col-auto">
                    <p><b>Cantidad de Datos: </b>{{$totalB}}</p>
                </div>
                <div class="col-auto">
                    <p><span style="color: cadetblue"><i class="fas fa-thermometer-full"></i></span><b>Temperatura Promedio: </b>{{$tPromedioB}}°C</p>
                    <p><b>Humedad Promedio: </b>{{$hPromedioB}}%</p>
                </div>
                <div class="col-auto">
                    <p><span style="color: red"><i class="fas fa-thermometer-full"></i></span><b>Temperatura Máxma: </b>{{$tMaxB}}°C</p>
                    <p><b>Humedad Máxima: </b>{{$hMaxB}}%</p>
                </div>
                <div class="col-auto">
                    <p><i class="fas fa-thermometer-empty"></i><b>Temperatura Mínima: </b>{{$tMinB}}°C</p>
                    <p><b>Humedad Mínima: </b>{{$hMinB}}%</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header header-informe"><h5><b>Reporte</b></h5></div>
        
            <div class="table-responsive card-body">
                <table id="tabla_bodega" class=" table-hover table-condensed">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Temperatura</th>
                            <th class="px-4 py-2">Humedad</th>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Hora</th>
                        
                        </tr>
                    </thead>
                </table>       
            </div>
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
            
            ],
            "fnDrawCallback":function(){
                $(".verBodega").unbind("click").click(function(){
                    let id = $(this).data("id");
                    console.log(id);
            
                });
            }
        });
    </script>

    <div class="card">
        <div class="card-header" data-toggle="collapse" data-target="#almacen-expand">
            <button class="btn btn-link"  aria-expanded="true" aria-controls="#almacen-expand">
              <h2><i class="fas fa-sitemap"></i> Informe Almacén</h2>
            </button>
        </div>
    </div>
    <div id="almacen-expand" class="collapse " aria-labelledby="headingTwo" data-parent="#padre">
    @include('livewire.almacen')

    </div>

    <div class="card">
        <div class="card-header" data-toggle="collapse" data-target="#descarga-expand">
            <button class="btn btn-link"  aria-expanded="true" aria-controls="#descarga-expand">
                <h2><i class="fas fa-trailer"></i> Informe de Descarga</h2> </button>
        </div>
    </div>
    <div id="descarga-expand" class="collapse " aria-labelledby="headingTwo" data-parent="#padre">
        @include('livewire.descarga')
    </div>
</&div>

