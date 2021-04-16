<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Almacen;
class AlmacenController extends Controller
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
     * funcion que devuelve todos los datos de bodega
     */
    public function cargar(){
        $bodega = Almacen::all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacen = new Almacen;
        $almacen->temperatura = $request->temperatura;
        $almacen->humedad = $request->humedad;
        $almacen->fecha =$request->fecha;
        $almacen->descripcion=$request->descripcion;
        $almacen->save();
    }

    /**
     * Muestra los resultado 
     *
     * @param  int  $id de la tabla
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Almacen::where('id', $id)->get();
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
