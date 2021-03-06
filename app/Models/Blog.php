<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Category;
use App\Models\Tag;
use App\User;
use  Carbon\Carbon;

class Blog extends Model
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

    protected $table = 'blogs';

    protected $fillable = [
       'user_id', 'category_id', 'title', 'slug', 'extracto', 'content', 'status', 'file', 'iframe', 
    ];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    public function category(){
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopePublicados($query){

        $query->orderBy('id', 'DESC')
                // ->whereNotNull('published_at')
                // ->where('published_at', '<=' , Carbon::now() )
                // ->latest('published_at')
                ->where('status', 'PUBLICADO');

    }

    public function setCategoryIdAttribute($category){
        // Se guarda la categoria si a sido creada directamente desde el formulario
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' =>  $category ])->id;
    }

    public function syncTags($tags){
        // guardar las etiquetas si han sido creadas directamente desde el formulario
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        // guardar etiquetas en la tabla relacional
        return $this->tags()->sync($tagIds);
    }
}
