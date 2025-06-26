<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory; 

    protected $fillable = [
    'booking_id',
    'room_type',
    'check_in_date',
    'check_out_date',
    'email',
    'guest_count',
    'gcash_phone',
    'gcash_reference',
    'note',
    'price',
];
}
