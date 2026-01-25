<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function checkLogin(Request $request)
    {
        if ($request->input('username') == 'HoangDuc' && $request->input('password') == '123456') {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        } else {
            return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác!');
        }
    }
    
    public function checkRegister(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $mssv = $request->input('mssv');

        return "Registration successful!<br>" .
            "Username: $username<br>" .
            "Email: $email<br>" .
            "Phone: $phone<br>" .
            "MSSV: $mssv";
    }
}
