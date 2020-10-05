<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Curso;

/**
 * App\Models\Leccion
 *
 * @property int $id
 * @property int $user_id
 * @property int $curso_id
 * @property int $order
 * @property string $leccion_type
 * @property string $title_leccion
 * @property string|null $description_leccion
 * @property string|null $url_video
 * @property string|null $file
 * @property int|null $duracion_leccion Total minutes if apply
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereleccionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereleccionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Curso $curso
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Leccion forTeacher()
 */

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
        'curso_id', 'user_id', 'title_leccion', 'slug', 'order', 'leccion_type', 'description_leccion', 'duracion_leccion', 'url_video', 'file'
    ];

    const VIDEO = "VIDEO";
    const ZIP = "ZIP"; 

    protected static function boot()
    {
        parent::boot();

        // Metodo para actilizar
        self::saving(function ($table) {
            $table->user_id = auth()->id();
        });
        
        // Metodo para crear
        self::creating(function ($table) {
            $last = Leccion::whereCursoId(request("curso_id"))
                ->orderBy('order', 'desc')
                ->take(1)
                ->first();
            $table->order = $last ? $last->order += 1 : 1;
        });
    }
    
    public function curso(){
        return $this->belongsTo(Curso::class)->withTimestamps();
    }

    public static function LeccionTypes() {
        return [
            self::VIDEO, self::ZIP 
        ];
    }
}
