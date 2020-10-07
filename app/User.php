<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\RolesPermisos\Traits\UserTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\UserActivationToken;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Comentario;
use App\Traits\Hashidable;

class User extends Authenticatable
{
    use Notifiable, UserTrait;
    // use Hashidable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function activate(){
        $this->update(['status' => true]);

        Auth::login($this);

        $this->token->delete();
    }
    
    public function token(){
        return $this->hasOne(UserActivationToken::class);
    }

    public function generateToken(){

        // Se le crea el token al usuario recien registrado
        $token = Str::random(60);
        $this->token()->create([
            'token'     => $token
        ]);
        
        // Se retorna la instancia del user
        return $this;

    }

    public function comentarios ()
    {
        return $this->belongsToMany(Comentario::class)->withTimestamps();
    }



}
