<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $allowed = ['facebook', 'google'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
