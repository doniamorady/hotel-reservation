<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

class Booking extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    
    public function getStartDateJalaliAttribute(){
        return Jalalian::fromDateTime($this->start_date)->format('Y/m/d');
    }
    
    public function getEndDateJalaliAttribute(){
                return Jalalian::fromDateTime($this->end_date)->format('Y/m/d');

    }
}
