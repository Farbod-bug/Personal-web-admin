<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user)
        {
            if (Hash::check($request->password, $user->password)) {
                auth()->login($user);

                session(['user' => $user]);

                return redirect()->route('dashboard')->with('success', 'با موفقیت لاگین شدید');
            }
            else
            {
                return back()->withErrors([
                    'password' => 'پسورد اشتباه است',
                ])->withInput();
            }
        }
        else
        {
            return back()->withErrors([
                'email' => 'ایمیل وجود ندارد',
            ])->withInput();
        }
    }

    public function logout(Request $request)
{
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.loginForm')->with('success', 'با موفقیت از حساب کاربری خارج شدید');
}
}
