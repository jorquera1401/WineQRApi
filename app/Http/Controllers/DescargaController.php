<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descarga;
use Illuminate\Support\Facades\Storage;



class DescargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * retorna el dataset de descarga para la API 
     * 
     */
    public function cargar(){
       $descarga = Descarga::all();
       $data =[];
       $data['total'] = collect($descarga)->count();
       $data['promedioDistancia'] = (int)collect($descarga)->avg('distancia')/100;
       foreach($descarga as $item){
           $data['fecha'][] = substr($item->fecha,0,11);
           $data['hora'][]  = substr($item->fecha,11);
           $data['distancia'][] = (float) round($item->distancia/100,2);
       } 
       return json_encode($data);
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
        $descarga = new Descarga;
        $descarga->fecha = $request->fecha;
        $descarga->descripcion = $request->descripcion;
        $descarga->distancia = $request->distancia;
        $descarga->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Descarga::where('id',$id)->get();
    }
    
          /**
     * Imagen en base64 de la viña
     */
    public function getImage(){
        $imagen = Storage::disk('images_base64')->get('descarga');
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
