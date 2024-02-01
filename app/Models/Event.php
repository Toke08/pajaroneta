<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'date',
        'location_id'
    ];

    function location(){
      return $this->belongsTo(Location::class);
    }

}
