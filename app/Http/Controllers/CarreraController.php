<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras=carrera::all();
        return view('carreras.consulta',['carreras'=>$carreras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carreras.alta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevacarrera=new carrera;
        $nuevacarrera->nombre=$request->nombre;
        $nuevacarrera->fcreacion=$request->fcreacion;
        $nuevacarrera->creditos=$request->creditos;
        $nuevacarrera->save();
        return redirect('/carrera');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit($carrera)
    {
        $carreraeditar=carrera::findorfail($carrera);
        return view('carreras.actualizacion',['carrera'=>$carreraeditar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $carrera)
    {
        $nuevacarrera=carrera::findorfail($carrera);
        $nuevacarrera->nombre=$request->nombre;
        $nuevacarrera->fcreacion=$request->fcreacion;
        $nuevacarrera->creditos=$request->creditos;
        $nuevacarrera->save();
        return redirect('/carrera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($carrera)
    {
        $nuevacarrera=carrera::destroy($carrera);
        return redirect('/carrera');
    }
}
