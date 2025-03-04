<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterController
 * Mengelola proses registrasi pengguna
 */
class RegisterController extends Controller
{
    /**
     * Menampilkan halaman registrasi
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Menyimpan data pengguna baru
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Kamu nggak punya nama? Kamu WNI bukan sih?',
            'email.required' => 'Jaman sekarang minimal punya 1 email',
            'password.required' => 'Serius?'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pemilik'
        ]);
        session()->flash('success', 'Akun berhasil didaftarkan');
        return redirect(route('register'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
