<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserLoginController extends Controller
{
    public function index() {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
    
   // Attempt to authenticate the user
   if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
    // Throw validation exception with custom message
    throw ValidationException::withMessages([
        'email' => 'ກະລຸນາກວດສອບອີເມວ ຫຼື ລະຫັດຜ່ານ',
    ]);
}

// If authentication is successful, get the user
$user = Auth::user();

// Check the user's role and redirect accordingly
if ($user->role === 'admin') {
    return redirect()->route('admin.dashboard');
} elseif ($user->role === 'customer') {
    return redirect()->route('account.welcome');
} else {
    return redirect()->route('account.login')
        ->withInput()
        ->withErrors('error', 'ບໍ່ສາມາດເຂົ້າສູ່ລະບົບ');
} 
}
    public function register(){
      return view('register');
     }
    public function processregister(Request $request){

        $validate = Validator::make($request->all(),[
            'email'=> 'required|email|unique:users',
            'password'=> 'required|confirmed'
        ]);
        if($validate->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();
            return redirect()->route('account.login')->with('success',"regis suc");
        }
        else{
            return redirect()->route('account.register')->withInput()->withErrors('error',"kuyyy");
        }

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
        // Redirect to login page
        return redirect()->route('account.login')->with('success', 'ສະໝັກສຳເລັດ! ກາລຸນາລ໋ອກອີນ');
    }
    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('welcome');
    }
}
/*     public function loginAction(Request $request)
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
        // Regenerate session
        $request->session()->regenerate();
        // Redirect to the home page
        return redirect()->route('home');
    } */