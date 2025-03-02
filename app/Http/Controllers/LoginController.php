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

    public function process(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Yakali masukin password aja',
            'password.required' => 'Serius gak punya password?'
        ]);
        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->route('admin');
        }
        return back()->withErrors([
            'email' => 'Auth gagal'
        ])->onlyInput('email');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin'); 
    }
}
