<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'url',
        'img',
        'tag_id'
    ];

    function tag(){
        return $this->belongsTo(tag::class);
    }

}
