<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Carrera;
use App\Models\Leccion;
use App\Models\Comentario;
use App\Models\Valoracion;
use App\Traits\Hashidable;
use App\User;

/**
 * App\Models\Curso
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property int $featured
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Valoracion[] $valoraciones
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $estudiantes
 * @property-read int|null $estudiantes_count
 * @property-read \App\Models\User $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso filtered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso forTeacher()
 * @property-read mixed $formatted_price
 * @property-read mixed $rating
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Leccion[] $leccion
 * @property-read int|null $lecciones_count
 */

class Curso extends Model
{
    // use Hashidable;
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
       'user_id', 'carrera_id', 'title', 'slug', 'thumbnail', 'extracto', 'description', 'precio', 'duracion_curso', 'nivel_habilidad', 'lenguaje', 'instructor', 'valoracion', 'status', 'url_video_preview_curso', 'gratis', 'featured' 
    ];

    const DISPONIBLE = 1;
    const INHABILITADO = 2;
    const PENDIENTE = 3 ;
    const RECHAZADO = 4;

    protected static function boot() {
        parent::boot();
        if ( !app()->runningInConsole()) {
            self::saving(function ($table) {
                $table->user_id = auth()->id();
            });
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function estudiantes(){
        return $this->belongsToMany(User::class, 'curso_user');
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id')->withDefault();
    }

    public function lecciones(){
        return $this->hasMany(Leccion::class)->orderBy("order", "asc");
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    // public function lecciones(){
    //     return $this->hasMany(CursoLeccion::class, 'curso_id', 'id')->withTimestamps();
    // }

    public function valoraciones(){
        return $this->hasMany(Valoracion::class);
    }

    public function scopeSearch($query, $title){
        return $query->where('title', 'LIKE', "%$title%");
    }

    public function scopeFiltro(Builder $builder) {
        $builder->withCount("estudiantes");
        $builder->where("status", Curso::DISPONIBLE);
        if (session()->has('search[cursos]')) {
            $builder->where('title', 'LIKE', '%' . session('search[cursos]') . '%');
        }
        return $builder->paginate(9);
    }
    
}
