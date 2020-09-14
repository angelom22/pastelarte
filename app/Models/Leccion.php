<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Curso;

class Leccion extends Model
{
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

    protected $table = 'lecciones';

    protected $fillable = [
       'title', 'slug', 'desciption', 'url_video'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class,'id', 'id_leccion')->withDefault();
    }
}
