<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * Mengelola proses login dan logout pengguna
 */
class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Memproses autentikasi pengguna
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Melakukan logout pengguna
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin'); 
    }
}
