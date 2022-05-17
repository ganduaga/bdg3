<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    use HasFactory;

    public function carreras()
    {
        return $this->belongsTo(carrera::class,'carrera_id','id');
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class,'alumnomaterias', 'alumno_id', 'materia_id')->withPivot('id');
    }
}
