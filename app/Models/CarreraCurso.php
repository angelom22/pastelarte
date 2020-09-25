<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Carrera;
use App\Models\Curso;

class CarreraCurso extends Model
{
    protected $table = "carrera_curso";

    protected $fillable = ['carrera_id', 'curso_id'];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id')->withDefault();
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'id')->withDefault();
    }
}
