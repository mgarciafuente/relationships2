<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'text'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function topics() {
        return $this->belongsToMany('App\Models\Topic');
    }
}
