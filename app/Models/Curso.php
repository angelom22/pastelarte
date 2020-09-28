<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Carrera;
use App\Models\Leccion;
use App\Models\CursoLeccion;
use App\User;

class Curso extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => true,
            ],

        ];
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'cursos';

    protected $fillable = [
       'user_id', 'carrera_id', 'title', 'slug', 'thumbnail', 'extracto', 'description', 'precio', 'duracion_curso', 'nivel_habilidad', 'lenguaje', 'instructor', 'valoracion', 'status', 'url_video_preview_curso' 
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id')->withDefault();
    }

    public function lecciones(){
        return $this->belongsToMany(Leccion::class)->withTimestamps();
    }

    // public function lecciones(){
    //     return $this->hasMany(CursoLeccion::class, 'curso_id', 'id')->withTimestamps();
    // }

    public function scopeSearch($query, $title){
        return $query->where('title', 'LIKE', "%$title%");
    }

    
}
