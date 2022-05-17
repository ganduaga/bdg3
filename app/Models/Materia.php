<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\carrera;

class Materia extends Model
{
    use HasFactory;

    public function carreras()
    {
        return $this->belongsTo(carrera::class,'carreras_id','id');
    }

    public function alumnos()
    {
        return $this->belongsToMany(alumno::class,'alumnomaterias', 'materia_id', 'alumno_id')->withPivot('id');
    }
}
