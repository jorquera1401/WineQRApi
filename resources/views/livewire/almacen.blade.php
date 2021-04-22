<div>

    <h1>Datos Almacen</h1>


    <div>
        <table id="tabla_almacen" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Temperatura</th>
                    <th>Humedad</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>

    
    <div class="container row text-white">
        <div class="col-6 col-md-4 bg-primary  ">
            <h3>Resumen Datos Bodega</h3>
         
            <p>Cantidad de Datos: {{$totalA}}</p>
        </div>
        <div class="col bg-success">
            <h3>Promedio</h3>
            <p>Temperatura Promedio: {{$tPromedioA}}°C</p>
            <p>Humedad Promedio : {{$hPromedioA}}%</p>
        </div>
        <div class="col bg-danger  ">
            <h3>Máxima</h3>
            <p>Temperatura Maxima : {{$tMaxA}}°C</p>
            <p>Humedad Máxima : {{$hMaxA}}%</p>
            
        </div>
        <div class="col bg-secondary ">
            <h3>Minima</h3>
            <p>Temperatura Minima : {{$tMinA}}°C</p>    
            <p>Humedad Minima : {{$hMinA}}%</p>
        
        </div>    

    </div>

    <script>
        var datosAlmacen = JSON.parse('<?php echo $dataAlmacen ?>');
        var detalleAlmacen;
        $(document).ready(function(){
            
        
        })
        $("#tabla_almacen").DataTable({
            data: datosAlmacen, 
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
                        return '<button wire:click="visualizarAlmacen('+fila.id+')"  class="btn btn-success verAlmacen" data-id='+fila.id+'>Ver</button>';
                    }
                }
            ],
            "fnDrawCallback":function(){
                $(".verAlmacen").unbind("click").click(function(){
                    let id = $(this).data("id");
                    detalleAlmacen = "<?php echo $datosAlmacen?>";
                    console.log(detalleAlmacen);
            
                });
            }
        });
    </script>

</div>