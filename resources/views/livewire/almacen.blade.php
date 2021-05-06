<div>
 
    <div class="card">
        <div class="card-header header-resumen"><h5><b>Resumen</b></h5></div>
        <div class="card-body row">
            <div class="col-auto">
                <p><b>Cantidad de Datos: </b>{{$totalA}}</p>
            </div>
            <div class="col-auto">
                <p><span style="color: cadetblue"><i class="fas fa-thermometer-full"></i></span><b>Temperatura Promedio: </b>{{$tPromedioA}}°C</p>
                <p><i class="fas fa-cloud-sun"></i><b>Humedad Promedio: </b>{{$hPromedioA}}%</p>
            </div>
            <div class="col-auto">
                <p><span style="color:red"><i class="fas fa-thermometer-full"></i></span><b>Temperatura Máxma: </b>{{$tMaxA}}°C</p>
                <p><i class="fas fa-cloud-sun"></i><b>Humedad Máxima: </b>{{$hMaxA}}%</p>
            </div>
            <div class="col-auto">
                <p><i class="fas fa-thermometer-empty"></i><b>Temperatura Mínima: </b>{{$tMinA}}°C</p>
                <p><i class="fas fa-cloud-sun"></i><b>Humedad Mínima: </b>{{$hMinA}}%</p>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header header-informe"><h5><b>Reporte</b></h5></div>
        <table id="tabla_almacen" class="table card-body table-hover ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Temperatura</th>
                    <th>Humedad</th>
                    <th>Fecha</th>
                    <th>Hora</th> 
                </tr>
            </thead>
        </table>
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