<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileUserController;

class AuthController extends Controller
{
    public function register()
    {
        return view('register'); // Updated view path
    }

    public function registerSave(Request $request)
    {
        // Validation for registration form
        $request->validate(
            [
                'firstName' => 'required|string|max:20',
                'lastName'  => 'required|string|max:50',
                'email'     => 'required|email|unique:users,email',
                'phone'     => 'required|digits_between:8,15|unique:users,phone',
                'password'  => 'required|confirmed|min:8',
            ],
            [
                'firstName.required' => 'ກາລຸນາປ້ອນຊື່ຂອງທ່ານ',
                'firstName.max' => 'ປ້ອນຊື່ບໍ່ໃຫ້ເກີນ 20 ຕົວອັກສອນ',
                'lastName.required' => 'ກາລຸນາປ້ອນນາມສະກຸນ',
                'email.required' => 'ກາລຸນາປ້ອນອີເມວ',
                'email.unique' => 'ອີເມວນີ້ຖືກໃຊ້ແລ້ວ',
                'phone.required' => 'ກາລຸນາປ້ອນເບີໂທ',
                'phone.unique' => 'ເບີໂທນີ້ຖືກໃຊ້ແລ້ວ',
                'password.required' => 'ກາລຸນາປ້ອນລະຫັດຜ່ານ',
                'password.confirmed' => 'ລະຫັດຜ່ານບໍ່ຕົງກັນ',
                'password.min' => 'ລະຫັດຜ່ານຕ້ອງຍາວກວ່າ 8 ຕົວອັກສອນ',
            ]
        );

        // Create new user
        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => '0',
        ]);

        // Redirect to login page - Updated route name
        return redirect()->route('login')->with('success', 'ສະໝັກສຳເລັດ! ກາລຸນາລ໋ອກອີນ');
    }

    public function login()
    {
        return view('login');  // Updated view path
    }

    public function loginAction(Request $request)
    {
        // Validate login form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'ກາລຸນາປ້ອນອີເມວ',
            'email.email' => 'ກາລຸນາປ້ອນອີເມວທີ່ຖືກຕ້ອງ',
            'password.required' => 'ກາລຸນາປ້ອນລະຫັດຜ່ານ',
        ]);

        // Check login credentials
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'ລ໋ອກອີນບໍ່ສຳເລັດ! ກະລຸນາກວດສອບອີເມວ ຫຼື ລະຫັດຜ່ານ',
            ]);
        }
          if(Auth::user()->type == 'admin'){
            return redirect()->route('adminpage/admin.dashboard');
          }
        // Regenerate session
        $request->session()->regenerate();

        // Redirect to the account welcome page - CRITICAL CHANGE
        return redirect()->route('welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page - Updated route name
        return redirect(route('welcome'));;
    }
}