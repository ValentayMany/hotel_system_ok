<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;
use App\Models\User;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type',
        'price_per_night',
        'status',
        'room_type_id',
    ];

    protected $primaryKey = 'room_id';
    // Room มีการจองหลายอัน (One-to-Many)
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id');
    }
         
    public function user()
    {

        return $this->belongto(User::class, 'user_id');
    }
    public function roomtype()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
    

}
