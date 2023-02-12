<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
    ];

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function direction() {
        return $this->hasOne('App\Models\Direction');
    }
    
}
