<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carga;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carga = Carga::all();
        return view('carga')->with('cargas',$carga);
    }

    public function generar(Request $request){
        $carga = $request->input('carga_item');
        return view('codigoQr',array('codigo'=>$carga,'tipo'=>'carga'));
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
        $carga = new Carga;
        $carga->fecha = $request->fecha;
        $carga->peso = $request->peso;
        $carga->descripcion = $request->descripcion;
        $carga->hash_entrada = $request->hash_entrada;
        $carga->hash_salida = $request->hash_salida;
        $carga->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Carga::where('hash_salida', $id)->get();
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
