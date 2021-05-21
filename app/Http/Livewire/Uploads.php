<?php

namespace App\Http\Livewire;

use ErrorException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Intervention\Image\Facades\Image;



class Uploads extends Component
{
    use WithFileUploads;
    public $mensaje;
    public $foto;
    public $nombreI;
    public $imagen;

    public function render()
    {
        return view('livewire.uploads');
    }
    /**
     * Transforma imagen a base 64
     */
    public function subirImagen(){
 
       if($this->nombreI!=''){
        if($this->foto){

            $info   = pathinfo($this->foto->path());
            $codificado = base64_encode(file_get_contents($this->foto->path()));
            $data = 'data:'.mime_content_type($this->foto->path()).";base64,".$codificado;
            $mime = mime_content_type($this->foto->path());
            
            
            
        
            $texto = $this->nombreI;
            $this->mensaje = $texto;
            $result = $this->guardarImagen($this->nombreI,$data);


            $archivo = $this->getImagen($this->nombreI);
        
            $this->imagen = $archivo;
            $this->foto=null;
        }else{
            Session::flash('error','Cargar imagen');
        }
        }else{
             Session::flash('error','Seleccione un proceso para el nombre de la imagen');
        }
  
    }
    /**
     * Busca la imagen seleccionado en la opciones de la vista
     */
    public function buscar(){
        if($this->nombreI!=''){
            $archivo = $this->getImagen($this->nombreI);
        if($archivo){
            $this->imagen = $archivo;
        }
    }

    }
    /**
     * Busca en el disco la imagen correspondiente al proceso seleccionado
     */
    public function getImagen($nombre){
        try{     
            $imagen = Storage::disk('images_base64')->get($nombre);
            return $imagen;
        }catch(FileNotFoundException $e){
            Session::flash('warning', 'No existen imagen pre cargada de '.$nombre.' en el servidor ');
            return null;
        }
    }

    /**
     * Guarda la imagen base_64 en el disco del sistema  
     */
    public function guardarImagen($nombre,$imagen_codificada){
   
        $result = Storage::disk('images_base64')->put($nombre,$imagen_codificada);
        return $result;
    }


    /**
     * obtiene la imagen codificada en base_64 
     */
    public function getB64Image($base64_image){
        
        
        $image_service_str = substr($base64_image,strpos($base64_image,",")+1);
        $image = base64_decode($image_service_str);
        return $image;
        
    }
    /**
     * Obtiene el formato del archivo de la imagen y extension
     */
    public function getB64Extension($base64_image,$full=null){
        preg_match("/^data:image\/(.*);base64/i",$base64_image, $img_extension);   
        return ($full) ?  $img_extension[0] : $img_extension[1];  
    }
}
