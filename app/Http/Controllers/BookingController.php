<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Booking as ModelsBooking;
use App\Models\History;

class BookingController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->user_id;
        $BookDetails = Booking::where('user_id', $user_id)->with('room')->get();
        // dd($BookDetails);
        return view('BookDetails', compact('BookDetails'));
    }



    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลที่รับเข้ามา
        $validatedData = $request->validate([
            'room_id' => 'required|integer',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'guest_name' => 'required|string|max:255',
            'guest_phone' => 'required|string|max:20',
            'guest_email' => 'required|email',
            'total_price' => 'required|numeric|min:0',
        ]);

        $checkInDate = Carbon::parse($validatedData['check_in_date']);
        $checkOutDate = Carbon::parse($validatedData['check_out_date']);
        $numberOfDays = $checkOutDate->diffInDays($checkInDate);

        // ดึงข้อมูลห้องพักจากฐานข้อมูล
        $room = Room::findOrFail($validatedData['room_id']);
        $pricePerNight = $room->price; // ราคาต่อคืนของห้องพัก

        // ตรวจสอบว่าห้องพักว่างหรือไม่
        $isRoomAvailable = !Booking::where('room_id', $validatedData['room_id'])
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate]);
            })->exists();
        if (!$isRoomAvailable) {
            return redirect()->back()->withErrors(['room_id' => 'ห้องนี้ถูกจองแล้วในช่วงเวลาดังกล่าว']);
        }

        // คำนวณราคารวม
        $totalPrice = $pricePerNight * $numberOfDays;

        // สร้างการจอง
        DB::transaction(function () use ($validatedData, $totalPrice) {
            Booking::create([
                'user_id' => auth()->id(),
                'room_id' => $validatedData['room_id'],
                'check_in_date' => $validatedData['check_in_date'],
                'check_out_date' => $validatedData['check_out_date'],
                'guest_name' => $validatedData['guest_name'],
                'guest_phone' => $validatedData['guest_phone'],
                'guest_email' => $validatedData['guest_email'],
                'total_price' => $totalPrice,
            ]);
        });

        return redirect()->route('welcome')->with('success', 'การจองสำเร็จแล้ว!');
    }
   


    public function history()
    {
        $history = Booking::with([
            'user:user_id,firstName,email,phone',
            'room:room_id,room_number,room_type_id',  // This is correct now
            'room.roomType:id,name'
        ])->get();

        return view('history', compact('history'));
    }
    public function delete($id)
    {
        $history = Booking::find($id);
        $history->delete();
        return redirect()->route('history')->with('success', 'Booking has been deleted successfully');
    }
}
