<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vina;
use Illuminate\Support\Facades\Storage;

class VinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vinas = Vina::all();
        return view('vina')->with('vinas',$vinas);
    }

    public function generar(Request $request){
   
        $vina = $request->input('nombre');
        $direccion = "http://localhost:8000/api/vina/".$vina;
        return view('codigoQr',array('codigo'=>$vina, 'tipo'=>"vina"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $vina = new Vina;
        $vina->nombre = $request->nombre;
        $vina->direccion  =$request->direccion;
        $vina->descripcion = $request->descripcion;
        $vina->hash = $request->hash;
        $vina->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vina  = Vina::where('hash','like', '%'.$id)->get();
       
        return  $vina;

    }


    /**
     * Imagen en base64 de la viña
     */
    public function getImage(){
        $imagen = Storage::disk('images_base64')->get('vina');
        $data['imagen'] =  $imagen;
        return json_encode($data,JSON_UNESCAPED_SLASHES);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
