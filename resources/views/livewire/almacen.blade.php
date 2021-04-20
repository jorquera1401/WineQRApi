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