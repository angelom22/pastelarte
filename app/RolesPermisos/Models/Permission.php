<?php

namespace App\RolesPermisos\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Permission extends Model
{
    //es: desde aqui
    //en: from here
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function roles(){
        return $this->belongsToMany('App\RolesPermisos\Models\Role')->withTimesTamps();
    }

}
