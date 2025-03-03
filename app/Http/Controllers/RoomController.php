<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::with(['room_types', 'features']);

        // Filter by room type
        if ($request->has('room_type')) {
            $query->where('room_type_id', $request->room_type);
        }

        // Filter by price range
        if ($request->has('price_range')) {
            if ($request->price_range === 'low') {
                $query->orderBy('price', 'asc');
            } elseif ($request->price_range === 'high') {
                $query->orderBy('price', 'desc');
            }
        }

       /*  $rooms = $query->where('is_available', true)->get(); */
        // $rooms = Room::all();
        // $Booking = Booking::all()->pluck('id');
        // $rooms = Room::whereNotIn('room_id', $Booking)->get();
$bookedRoomIds = Booking::pluck('room_id')->toArray();

$availableRoomIds = Room::whereNotIn('room_id', $bookedRoomIds)->pluck('room_id')->toArray();

$rooms = Room::whereIn('room_id', $availableRoomIds)->get(); 
// dd($rooms);
// dd($rooms); 
        return view('rooms', compact('rooms'));
    }

    // public function show(Request $request)
    // {
    //     $room->load(['roomType', 'features']);
    //     return view('rooms.show', compact('room'));
    // }
    public function roomdata($id)
{
    $data = Room::where('room_id', $id)->first(); // Use room_id instead of id
    if (!$data) {
        return back()->withErrors(['error' => 'Room not found.']);
    }

    return view('bookingForm', compact('data'));
}


    // public function bookingroom()
    //     {
    //        return view('bookingform', compact('data'));
    //     }
    public function roomadmin(){
        $rooms = Room::get();
    
        return view('roomadmin', compact('rooms'));

    }
    public function deleteroomadmin($room_id){
        $rooms = Room::find($room_id);
        if ($rooms) {
            $rooms->delete();
            return redirect()->route('admin.roomadmin')->with('success', 'Room has been deleted successfully');
        } else {
            return redirect()->route('admin.roomadmin')->with('error', 'Room not found.');
        }
    }   
     }
