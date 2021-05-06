<div>
 
    <div class="card">
        <div class="card-header header-resumen">
            <h5><b>Resumen</b></h5>
        </div>
        <div class="card-body">
            <p><b>Cantidad de Descargas: </b>{{$totalD}}</p>
            <p><b>Distancia Promedio de Descargas: </b>{{$promedioD}} mts</p>
            <p><b>Distancia mínima y máxima para estacionamiento de carro </b></p>
            <div class="row">
                <div class="col-auto">
                    <p>0 mts</p>
                </div>
                <div class="col">
                  
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: {{($promedioD/6)*100}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>  
                </div>
                <div class="col-auto">
                    <p>6 mts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-informe">
            <h5><b>Reporte</b></h5>
        </div>
    
    <div class="card-body">
        <table id="tabla_descarga"  class="table tabla table-hover ">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Distancia (mts)</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                  
                </tr>
            </thead>
        </table>
    </div>
    </div>

    <script>
        var datosDescarga = JSON.parse('<?php echo $dataDescarga ?>');
        var detalleAlmacen;
        $(document).ready(function(){
            datosDescarga.map((e,k) => console.log('distancia '+k+' :', e.distancia));
            
        
        })
       $("#tabla_descarga").DataTable({
            data: datosDescarga, 
            responsive:true,
            columns:[
                
                {data:"id"},
                {data:"distancia"},
                {data:"fecha"},
                {data:"hora"},
             
            ],
            "fnDrawCallback":function(){
                $(".verAlmacen").unbind("click").click(function(){
                   
            
                });
            }
        });
    </script>
</div>