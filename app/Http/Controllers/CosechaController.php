<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cosecha;
use Illuminate\Support\Facades\Storage;

class CosechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cosecha = Cosecha::all();
        return view('cosecha')->with('cosechas', $cosecha);
    }

    public function generar(Request $request){
        $cosecha = $request->input('cosecha_item');
        return view('codigoQr', array('codigo'=>$cosecha, 'tipo'=>'cosecha'));
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
        $cosecha = new Cosecha;
        $cosecha->fecha = $request->fecha;
        $cosecha->temperatura=$request->temperatura;
        $cosecha->humedad=$request->humedad;
        $cosecha->descripcion = $request->descripcion;
        $cosecha->hash_entrada = $request->hash_entrada;
        $cosecha->hash_salida = $request->hash_salida;
        $cosecha->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cosecha::where('hash_salida', $id)->get();
    }

    
      /**
     * Imagen en base64 de la viña
     */
    public function getImage(){
        $imagen = Storage::disk('images_base64')->get('cosecha');
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
