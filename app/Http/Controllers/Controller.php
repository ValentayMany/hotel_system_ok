<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request; // ✅ เพิ่มบรรทัดนี้

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store(Request $request) // ✅ ใช้ Illuminate\Http\Request ที่ถูกต้อง
    {
        dd($request->all()); // ดูข้อมูลที่ส่งมา
    }
}
