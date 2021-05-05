<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


<div class="row card">
    <h2 class="card-header">Asignar Imágenes a Procesos</h2>
<div class="row card-body" style="height: 50vh">
    
    <form class="col container col-8" id="formulario" wire:submit.prevent="subirImagen" enctype="multipart/form-data">
        
        <div class="form-group row">
            <label for="nombre">Nombre</label>
            <select wire:model="nombreI" id="seleccion" wire:click="buscar()" class="form-select list-group" aria-label="Default selext Example">
                <option class="list-group-item" value="" selected>Seleccionar Proceso</option>
                <option class="list-group-item" value="vina">Viña</option>
                <option class="list-group-item" value="predio">Predio</option>
                <option class="list-group-item" value="cosecha">Cosecha</option>
                <option class="list-group-item" value="carga">Carga</option>
                <option class="list-group-item" value="descarga">Descarga</option>
                <option class="list-group-item" value="almacen">Almacen</option>
                <option class="list-group-item" value="bodega">Bodega</option>
            </select>
        </div>
        <div class="form-group row">
            <label for="imagen">File:</label>
            <input type="file" class="form-control" id="imagen" wire:model="foto"> 
        </div>
      
        <input type="submit"  id="boton" class="btn btn-success" value="Guardar"/>
        <div class="row">
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif    
        </div>
    </form>

    <div class="col col-4 container float-right"  >
        @if($imagen and $nombreI!="")
        <h5 class="font-weight-bold">Imagen en {{$nombreI}}</h5>
        <div class="d-flex  justify-content-center   border border-secondary">
            <img class="img-fluid rounded float-right" width="80%" height="80%" src="{{$imagen}}"/>
        </div>
        
        @endif
    </div>
</div>




<script>
   


    $("#imagen").on('change',function(e){
        let size = (this.files[0].size / 1024) / 1024 ;
        console.log(size,' MB');
        if(size>1){
          
          alert('archivo muy grande',size);
          this.value="";
 
        }else{
          
        }
        
    });

    $("#boton").click(function(){
        $("#imagen").value="";
        $("#imagen").val("");
    });
</script>
</div>
