<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'content',
        'img',
        'status',
        'tag_id'
    ];

    function tag(){
        return $this->belongsTo(Tag::class);
    }

    function comments(){
        return $this->hasMany(Comment::class);
    }

}
