<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;

class carrera extends Model
{
    use HasFactory;

    public function materias()
    {
        return $this->hasMany(Materia::class,'carreras_id','id');
    }

    public function alumnos()
    {
        return $this->hasMany(alumno::class,'carreras_id','id');
    }
}
