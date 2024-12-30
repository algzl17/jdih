<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public  function login_post(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',

            ],
            [],
            [
                'email' => 'Alamat email',
                'password' => 'Kata sandi'
            ]
        );

        $user = User::with('role')->where('email', $request->post('email'))->first();
        if ($user) {
            if (password_verify($request->post('password'), $user->password)) {
                Auth::login($user, true);
                return to_route('min.index');
            }
        }
        return back()->withErrors(['email' => 'Email atau kata sandi salah!']);
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}
