<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Leccion;
use App\Models\Curso;

class CursoLeccion extends Model
{
    protected $table = "curso_leccion";

    protected $fillable = ['curso_id', 'leccion_id'];


    public function Lenccion()
    {
        return $this->belongsTo(Leccion::class, 'leccion_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
