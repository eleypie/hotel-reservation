<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'room_type'
    ];

    protected $primaryKey = 'room_id';

    public function roomType() {
        return $this->belongsTo(RoomType::class, 'room_type', 'room_type');
    }

    public function bookings() {
        return $this->hasMany(Booking::class, 'room_id', 'room_id');
    }
}
