<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'province',
        'city',
        'address',
        'url',
        'cp'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($location) {
            // Eliminación en cascada de eventos
            $location->events()->delete();
        });
    }


    function calendars(){
        return $this->HasMany(Calendar::class);
      }
}
