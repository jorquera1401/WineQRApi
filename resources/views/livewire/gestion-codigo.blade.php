<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


    
    
    @if($cargaData)
    <div class="card ">
        <div class="card-header text-center bg-info text-white header-resumen">
            <h5><b>Resumen</b></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p><i class="fas fa-flag"></i> Primer Registro  <i class="far fa-calendar"></i> Fecha :<b> {{substr($primeraCaptura,0,11)}}</b> <i class="far fa-clock"></i> Hora: <b>{{substr($primeraCaptura,11)}}</b></p>
            </li>
            <li class="list-group-item">
                <p><i class="far fa-flag"></i> Ultima Registro <i class="far fa-calendar"></i> Fecha:<b>{{substr($ultimaCaptura,0,11)}} </b><i class="far fa-clock"></i> Hora : <b>{{substr($ultimaCaptura,11)}}</b> </p>
            </li>
            <li class="list-group-item">
                <p>Peso Promedio: {{$promedioPeso}} Kg</p>
            </li>
                
            <li class="list-group-item">
                <p>Peso Total:  {{$totalPeso}} Kg</p>
            </li>
        </ul>

    </div>
    <div class="card  bg-light ">
        <div class="card-header text-center bg-primary text-white header-informe"><h5><b>Datos</b></h5></div>    
        <div class="card-body">
            <table id="tabla_carga" class="table  table-bordered " style="width: 100%">
                <thead>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>PESO (KG)</th>
                    <th></th>
                </thead>
            </table>
        </div>
    </div>
    @else
        <div><h1>No Existen Datos de Carga</h1></div>
    
    @endif
    

    <div id="mymodal" class="modal " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content ">
        <div class="modal-header  text-white bg-secondary">
            <h5 class="modal-title">Detalle Carga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{route('carga_generate')}}">
        <div class="modal-body container">
                @csrf
                <div class="form-group row">
                    <label for="fechaCarga" class="col-sm col-form-label">Fecha de Captura</label>
                    <input readonly type="date" id="fechaCarga" class="col-sm" placeholder="Fecha De Captura"/>
                </div>
                <div class="form-group row">
                    <label for="horaCarga" class="col-form-label col-sm">Hora de Captura</label>
                    <input readonly type="label" id="horaCarga" class="col-sm" placeholder="Hora de Captura"/>
                </div>
                <div class="form-group row">
                    <label for="pesoCarga" class="col-form-label col-sm">Peso (Kg)</label>
                    <input readonly type="label" id="pesoCarga" class="col-sm" placeholder="Peso de Captura"/> 
                
                </div>
                <input type="hidden" id="hash_salida" name="carga_item" placeholder="Codigo"/>    
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Generar Codigo"/>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    
 
    
    
    

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
                        return '<button data-hash_salida='+fila.hash_salida+' data-id='+fila.id+' data-peso='+fila.peso+' data-hora='+fila.hora+'  data-fecha='+fila.fecha+' data-hash_entrada='+fila.hash_entrada+' class="btn btn-success verCarga"><i class="far fa-arrow-alt-circle-up"></i> Generar </button>'
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
                    $("#mymodal").modal();
                    console.log(id,hash_entrada,hash_salida,peso,hora,fecha);
                });
            }
        });
    </script>
    
</div>
