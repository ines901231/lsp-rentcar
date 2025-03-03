<?php

namespace App\Http\Controllers;

use App\Utils\Formatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function showPrice() {
        $harga = 75000;
        return Formatter::formatRupiah($harga);
    }
}
