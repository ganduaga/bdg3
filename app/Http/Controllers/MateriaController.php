<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\carrera;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias=Materia::all();
        return view('materias.consulta',['materias'=>$materias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=carrera::all();
        return view('materias.alta',['carreras'=>$carreras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevamateria=new Materia;
        $nuevamateria->nombre=$request->nombre;
        $nuevamateria->creditos=$request->creditos;
        $nuevamateria->carreras_id=$request->carrera_id;
        $nuevamateria->save();
        return redirect('/materia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($materia)
    {
        $carreras=carrera::all();
        $materia=Materia::findorfail($materia);
        return view('materias.actualizacion',['carreras'=>$carreras, 'materia'=>$materia]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $materia)
    {
        $nuevamateria=Materia::findorfail($materia);
        $nuevamateria->nombre=$request->nombre;
        $nuevamateria->creditos=$request->creditos;
        $nuevamateria->carreras_id=$request->carrera_id;
        $nuevamateria->save();
        return redirect('/materia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($materia)
    {
        Materia::destroy($materia);
        return redirect('/materia');
    }
}
