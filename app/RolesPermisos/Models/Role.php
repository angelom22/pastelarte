<?php

namespace App\RolesPermisos\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Hashidable;

    //es: desde aqui
    //en: from here
    protected $fillable = [
        'name', 'slug', 'description', 'full_access',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permissions(){
        return $this->belongsToMany('App\RolesPermisos\Models\Permission')->withTimesTamps();
    }

}
