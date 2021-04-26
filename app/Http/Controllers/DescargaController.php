<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descarga;
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
       $data['promedioDistancia'] = (int)collect($descarga)->avg('distancia');
       foreach($descarga as $item){
           $data['fecha'][] = substr($item->fecha,0,11);
           $data['hora'][]  = substr($item->fecha,11);
           $data['distancia'][] = $item->distancia;
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
