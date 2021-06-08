<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


<div class="row card" style="height: 80vh">
    <h2 class="card-header">Asignar Imágenes a Procesos</h2>
<div class="row card-body" style="height: 10vh">
    
    <form class="col container col-8" id="formulario" wire:submit.prevent="subirImagen" enctype="multipart/form-data">
        
        <div class="form-group row">
            <label for="nombre" class="col-3">Nombre</label>
            <select wire:model="nombreI" id="seleccion" wire:click="buscar()" class="form-select list-group col-8" aria-label="Default selext Example">
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
            <label for="imagen" class="col-3">Archivo:</label>
            <input type="file" class="form-control col-8" id="imagen" wire:model="foto"> 
        </div>
        <input type="submit"  id="boton"    class="  btn btn-success" value="Guardar"/>
            
        <div class="row">
            <div class="col-8">
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                 
                @endif
                @if(Session::has('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{Session::get('warning')}}
                        {{$imagen=null}}
                    </div>
                @endif

                @if($foto)
                    <div class="alert alert-info" role="alert">
                        <span>Imagen lista para almacenar</span>
                    </div>
                @endif
            </div>
        </div>
        
    </form>

    
<div class="row container float-right"  >
    @if($imagen and $nombreI!="")
        <div class="col col-4">
            <h5 class="row font-wight-bold">Imagen de {{$nombreI}}</h5>
            <button class="row button"  wire:click="eliminar()" >Eliminar</button>
        </div>
        {{--  <h5 class=" col col-4 font-weight-bold">Imagen en {{$nombreI}}</h5>  --}}
        <div class="col col-8 d-flex  justify-content-center   border border-secondary">
            <img class="img-fluid rounded float-right" width="80%" height="80%" src="{{$imagen}}"/>
        </div>
    @else 
    {{$imagen=null}}
    <div class="container ">
        <h3>No existe Imagen</h3>

    </div>
        
    @endif
</div>

</div>

</div>


<script>
   


    $("#imagen").on('change',function(e){
        let size = (this.files[0].size / 1024) / 1024 ;
        console.log(size,' MB');
        if(size>5){
          
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
