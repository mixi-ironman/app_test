<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm() 
    { 
        return view('client.layouts.auth.login'); 
    }

    public function registerForm() 
    { 
        return view('client.layouts.auth.register'); 
    }

    //Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user();
            return redirect()->route('home');
        } else {
            return redirect()->route('login-page')->withErrors(['message' => 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin đăng nhập!']);
        }
    }

    //Register
    public function register(Request $request)
    {
            $customer = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return redirect()->route('login-page')->with('msg', 'Bạn đã tạo tài khoản thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home'); 
    }
}
