<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory; 

    protected $fillable = [
        'booking_id',
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'email_confirmation',
        'guest_count',
        'gcash_phone',
        'gcash_reference',
        'note',
        'total_price',
        'status'
    ];

    // entities relationship
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    public function payment() {
        return $this->hasOne(Payment::class, 'booking_id', 'booking_id');
    }
}
