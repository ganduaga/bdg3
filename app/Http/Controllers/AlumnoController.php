<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\carrera;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos=alumno::all();
        return view('alumnos.consulta',['alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=carrera::all();
        return view('alumnos.alta',['carreras'=>$carreras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevoalumno=new alumno;
        $nuevoalumno->nombre=$request->nombre;
        $nuevoalumno->sexo=$request->sexo;
        $nuevoalumno->edad=$request->edad;
        $nuevoalumno->carrera_id=$request->carrera_id;
        if ($request->hasFile('foto')){
            $nuevoalumno->foto=$request->file('foto')->store('uploads','public');
        }
        $nuevoalumno->save();
        return redirect('/alumno');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(alumno $alumno)
    {
        $alumnoeditar=alumno::findorfail($alumno);
        $carreras=carrera::all();
        return view('alumnos.actualizacion',['alumno'=>$alumnoeditar, 'carreras'=>$carreras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumno $alumno)
    {
        $nuevoalumno=alumno::findorfail($alumno);
        $nuevoalumno->nombre=$request->nombre;
        $nuevoalumno->sexo=$request->sexo;
        $nuevoalumno->edad=$request->edad;
        $nuevoalumno->carrera_id=$request->carrera_id;
        $nuevoalumno->foto=$request->foto;
        $nuevoalumno->save();
        return redirect('/alumno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumno $alumno)
    {
        alumno::destroy($alumno);
        return redirect('/alumno');
    }
}
