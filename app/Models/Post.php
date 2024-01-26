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
        'date',
        'status',
        'tag_id'
    ];

    public $timestamps = false;

    function tag(){
        return $this->belongsTo(tag::class);
    }

}
