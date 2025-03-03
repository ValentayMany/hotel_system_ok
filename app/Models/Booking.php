<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Room;
use App\Models\Role;
use App\Models\Booking; 
use App\Models\History;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id', 'check_in_date', 'check_out_date',
        'guest_name', 'guest_phone', 'guest_email', 'total_price',
    ];
    
    
    protected $table = 'bookings'; // กำหนดชื่อตารางให้ตรงกับที่เราต้องการ
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
    
    public function room()
{
    return $this->belongsTo(Room::class, 'room_id', 'room_id'); // Ensure it's using 'room_id'
}
    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
    ];
    protected $primaryKey = 'id'; // กำหนด primary key ของตาราง users
    
    public function booking()
    {
        return $this->belongsToMany(history::class, 'id');
    }
    

    
}
