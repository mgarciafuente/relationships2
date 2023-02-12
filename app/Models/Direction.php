<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class Direction extends Authenticatable
{

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'postal_code',
        'city',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
}
