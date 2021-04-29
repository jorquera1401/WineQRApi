<div>
    <h1>Datos Descargas</h1>
    <div>
        <table id="tabla_descarga" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Distancia (mts)</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
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
                {
                    data : null,
                    render:function(data,type,fila,meta){
                        return '<button wire:click="visualizarAlmacen('+fila.id+')"  class="btn btn-success verAlmacen" data-id='+fila.id+'>Ver</button>';
                    }
                }
            ],
            "fnDrawCallback":function(){
                $(".verAlmacen").unbind("click").click(function(){
                   
            
                });
            }
        });
    </script>
</div>