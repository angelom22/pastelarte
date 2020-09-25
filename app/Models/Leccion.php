<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Curso;

class Leccion extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_leccion',
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

    protected $table = 'lecciones';

    protected $fillable = [
       'title_leccion', 'slug', 'description_leccion', 'duration_leccion', 'url_video', 'curso_id'
    ];

    // public function curso(){
    //     return $this->belongsTo(Curso::class,'id', 'id_leccion')->withDefault();
    // }
    public function curso(){
        return $this->belongsToMany(Curso::class, 'cursos')->withTimestamps();
    }
}
