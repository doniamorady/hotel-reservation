<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bed extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function rooms()
    {
        $this->belongsToMany(Room::class);
    }
}
