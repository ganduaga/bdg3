<?php

namespace App\Http\Controllers;

use App\Models\alumnomateria;
use App\Models\alumno;
use App\Models\Materia;
use Illuminate\Http\Request;

class AlumnomateriaController extends Controller
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
        $nuevoalumnomateria=new alumnomateria;
        $nuevoalumnomateria->alumno_id=$request->alumno_id;
        $nuevoalumnomateria->materia_id=$request->materia_id;
        $nuevoalumnomateria->save();
        return redirect('/alumnomaterias/'.$request->alumno_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumnomateria  $alumnomateria
     * @return \Illuminate\Http\Response
     */
    public function show($alumnomateria)
    {
        $alumno=alumno::findorfail($alumnomateria);
        $materiascarrera=Materia::where('carreras_id',$alumno->carrera_id)->get();
        return view('alumnomaterias.consulta',['alumno'=>$alumno, 'materiascarrera'=>$materiascarrera]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumnomateria  $alumnomateria
     * @return \Illuminate\Http\Response
     */
    public function edit(alumnomateria $alumnomateria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumnomateria  $alumnomateria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumnomateria $alumnomateria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumnomateria  $alumnomateria
     * @return \Illuminate\Http\Response
     */
    public function destroy($alumnomateria)
    {
        $alumnoMat=alumnomateria::findorfail($alumnomateria);
        alumnomateria::destroy($alumnomateria);
        return redirect('/alumnomaterias/'.$alumnoMat->alumno_id);
    }
}
