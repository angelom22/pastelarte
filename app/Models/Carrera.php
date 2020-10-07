<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Curso;
use App\Traits\Hashidable;

class Carrera extends Model
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

    protected $table = 'carreras';

    protected $fillable = [
       'title', 'slug', 'description', 'precio', 'url_video_preview_carrera'
    ];

    public function cursos(){
        return $this->belongsToMany(Curso::class)->withTimestamps();
    }
}
