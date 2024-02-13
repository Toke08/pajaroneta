<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'ciudad',
        'address',
        'url',
        'cp'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($location) {
            // Eliminar los eventos relacionados a esta ubicación
            $location->events()->delete();
        });
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'id_location');
    }
}
