<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth; // เพิ่มการใช้ Auth
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileUserController;

class ProfileUserController extends Controller
{
    // แสดง Profile ของ User ที่ Login
    public function index()
{
    // ดึง user ที่ล็อกอิน
    $user = auth()->user();
    
    // Debug เช็คค่าที่ได้
    // if (!Auth::check()) {
    //     dd('ผู้ใช้ยังไม่ได้ล็อกอิน');
    // }

    // ส่งข้อมูลไปยัง View
    return view('ProfileUser', compact('user'));
}

}