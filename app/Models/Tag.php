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

    function getRouteKeyName(){
        return 'id';
    }

    function posts(){
       return $this->hasMany(Post::class, 'tag_id');
    }

    function restaurants(){
        return $this->hasMany(Restaurant::class);
    }

}
