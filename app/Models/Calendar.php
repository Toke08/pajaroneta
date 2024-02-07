<?php

namespace App\Models;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'date',
        // 'start',
        // 'end'.
        'location_id',
        'event_id'
    ];

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

}
