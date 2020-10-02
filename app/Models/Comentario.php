<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Curso;

class Comentario extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'user_id', 'curso_id', 'contenido'
    ];

    // protected $guarded = []; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'id')->withDefault();
    }
}
