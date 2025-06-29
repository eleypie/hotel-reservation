<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_type',
        'room_name',
        'price',
        'max_guests'
    ];

    public function rooms() {
        return $this->hasMany(Room::class);
    }
}
