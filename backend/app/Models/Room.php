<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];


    public function beds()
    {
        return $this->belongsToMany(Bed::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
    public function gallery(){
        return $this->hasMany(Gallery::class);
    }
}
