<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;

class HomeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::with(['rooms' => function ($query) {
            $query->where('is_available', true);
        }])->get();

        return view('home', compact('roomTypes'));
    }
}