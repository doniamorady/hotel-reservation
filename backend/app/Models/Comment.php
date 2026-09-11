<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'room_id', 'body', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getStatusCommentAttribute()
    {

        switch ($this->status) {
            case 0:
                return 'رد شده';
            case 1:
                return 'تایید شده';
            case 2:
                return 'در انتظار بررسی';
        }
    }

    public function getColorStatusCommentAttribute()
    {

        switch ($this->status) {
            case 0:
                return 'danger';
            case 1:
                return 'success';
            case 2:
                return 'warning';
        }
    }
}
