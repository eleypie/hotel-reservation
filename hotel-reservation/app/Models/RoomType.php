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
    public $timestamps = false;
    protected $primaryKey = 'room_type';

    public function rooms() {
        return $this->hasMany(Room::class, 'room_type', 'room_type');
    } 
}
