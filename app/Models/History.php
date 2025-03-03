<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Room;
use App\Models\Role;
use App\Models\Booking;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'user_name', 'guest_email', 'guest_phone',
        'room_number', 'room_type', 'check_in_date', 'check_out_date','total_price'
    ];
    protected $primaryKey = 'his_id'; // กำหนด primary key ของตาราง users
    public function history()
    {
        return $this->belongsToMany(Booking::class , 'id');
    }
    
}
