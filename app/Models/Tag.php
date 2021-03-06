<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Event;
use App\Models\Blog;

class Tag extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
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
    protected $fillable = [
        'name', 'slug'
     ];
 
    public function blogs(){
        return $this->belongsToMany(Blog::class)->withTimesTamps();
    }

    public function events(){
        return $this->belongsToMany(Event::class)->withTimesTamps();
    }
     
}
