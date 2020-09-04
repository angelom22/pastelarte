<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Blog;

class Category extends Model
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

    protected $tabe = 'categories';

    protected $fillable = [
        'name', 'slug', 'description'
     ];
 
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
     
}
