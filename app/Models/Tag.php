<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    function posts(){
        $this->hasMany(Post::class);
    }

    function restaurants(){
        $this->hasMany(Restaurant::class);
    }

}
