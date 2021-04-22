<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


    
    
    @if($cargaData)
    <table id="tabla_carga" class="table ">
        <thead>
            <th>ID</th>
            <th>FECHA</th>
            <th>HORA</th>
            <th>PESO (KG)</th>
            <th></th>
        </thead>
    </table>
    @else
    
    @endif

    <form method="POST" action="{{route('carga_generate')}}">
        @csrf
        <input type="label" id="fechaCarga" placeholder="Fecha De Captura"/>
        <input type="label" id="horaCarga" placeholder="Hora de Captura"/>
        <input type="label" id="pesoCarga" placeholder="Peso de Captura"/>
        <input type="label" id="hash_salida" name="carga_item" placeholder="Codigo"/>
        <input type="submit" value="Generar Codigo"/>
    </form>

    <p>Gestor de codigo</p>
    <script>
        var dataCarga =  JSON.parse('<?php echo $cargaData; ?>');
           
        $(function(){
              console.log(dataCarga);
          });

        $("#tabla_carga").DataTable({
            data: dataCarga,
            responsive:true,
            columns:[
                {data:'id'},
                {data:'fecha'},
                {data:'hora'},
                {data:'peso'},
                {
                    data:null,
                    render:function(data,type,fila,meta){
                        return '<button data-hash_salida='+fila.hash_salida+' data-id='+fila.id+' data-peso='+fila.peso+' data-hora='+fila.hora+'  data-fecha='+fila.fecha+' data-hash_entrada='+fila.hash_entrada+' class="btn btn-success verCarga">Ver</button>'
                    }
                }
            ],
            "fnDrawCallback":function(){
                $(".verCarga").unbind('click').click(function(){
                    let id = $(this).data('id');
                    let hash_salida = $(this).data('hash_salida');
                    let hash_entrada = $(this).data('hash_entrada');
                    let peso = $(this).data('peso');
                    let hora = $(this).data('hora');
                    let fecha = $(this).data('fecha');
                    $("#horaCarga").val(hora);
                    $("#fechaCarga").val(fecha);
                    $("#hash_salida").val(hash_salida);
                    $("#pesoCarga").val(peso);
                    console.log(id,hash_entrada,hash_salida,peso,hora,fecha);
                });
            }
        });
    </script>
    
</div>
