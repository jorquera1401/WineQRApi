<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;
use PHPUnit\Util\Json;

class BodegaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabla  =true;
        return view('bodega')->with('tabla',$tabla);
    }

    public function cargarGrafico(){
        $tabla = false;
        return view('bodega')->with('tabla',$tabla);
    }

    /**
     * funcion que devuelve todos los datos de bodega
     */
    public function cargar(){
        $bodega = Bodega::all();
        $data = [];
        foreach($bodega as $item){
            $data['temperatura'][]=  $item->temperatura;
            $data['humedad'][]=$item->humedad;
            $data['fecha'][]=substr($item->fecha,0,11);
            $data['hora'][]=substr($item->fecha,11);
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

    public function visualizarDatos(){
        $bodega = Bodega::all();
        $data['temperatura']= $bodega->temperatura;
        $data['humedad']=$bodega->humedad;
        $data['fecha']=$bodega->fecha;
        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bodega = new Bodega;
        $bodega->fecha = $request->fecha;
        $bodega->temperatura = $request->temperatura;
        $bodega->humedad = $request->humedad;
        $bodega->descripcion = $request->descripcion;

        $bodega->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bodega::where('id', $id)->get();
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
