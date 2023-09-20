<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $kredensial = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($kredensial)) {
            if (Auth::user()->role === 1) {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            } elseif (Auth::user()->role === 2) {
                $request->session()->regenerate();
                return redirect()->intended('/dapur');
            } else {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return back()->with('gagal', 'Username/Password Salah');

        // dd('oke login berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
