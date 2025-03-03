<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\RoomType;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view('adminpage/dashboard');
    }

    Public function AddRoom(){
        $data = RoomType::all();
        return view('Add_Room', compact('data'));
    } 

    public function upload(Request $request)
    {
        $data = new Room();
        $data->room_type_id = $request->room_type_id;
        $data->room_number = $request->room_number;
        $data->description = $request->description;
        $data->price = floatval(str_replace(['ກີບ', '/', 'ຄືນ'], '', $request->price));

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
        
            // ກວດສອຍຊໍ້ຜິດພາດໃນຕອນອັບໂຫລດຮູບ
            if ($file->getError()) {
                return back()->withErrors(['image' => 'There was an error uploading the image.']);
            }
        
            // บันทึกไฟล์ไปที่ storage/app/public/images โดยใช้ชื่อไฟล์ที่ Laravel สร้างให้
            $imagePath = $file->store('images', 'public');
        
            // บันทึก path ไปยังฐานข้อมูล
            $data->image =  $imagePath;
        }

        $data->save();
        return redirect()->back()->with('success', 'Room has been added successfully');
    }

    public function edit($id)
    {
        $room = DB::table('rooms')->where('id', $id)->first();
        return view('edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'room_type_id' => $request->room_type_id,
            'room_number' => $request->room_number,
            'description' => $request->description,
            'price' => $request->price,
        ];

        
        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->getError()) {
                return back()->withErrors(['image' => 'There was an error uploading the image.']);
            }

            $imagePath = $file->store('images', 'public');
            $data['image'] = $imagePath;
        }

        DB::table('rooms')->where('id', $id)->update($data);
        return redirect('/room')->with('success', 'Room has been updated successfully');
    }
} 

