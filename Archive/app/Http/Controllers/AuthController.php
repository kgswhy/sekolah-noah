<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with([
            'ERR' => 'Email atau password yang anda masukan salah,<br>silahkan coba lagi.'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
