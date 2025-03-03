<?php

namespace App\Http\Controllers; // ✅ ต้องตรงกับตำแหน่งไฟล์

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

      /*   if (!$admin || !$admin->is_admin) {
            abort(403, 'Unauthorized action.');
        } */

        return view('ProfileAdmin', compact('admin'));
    }
}
