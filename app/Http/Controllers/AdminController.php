<?php

namespace App\Http\Controllers;

use App\Utils\Formatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminController
 * Controller untuk halaman admin
 */
class AdminController extends Controller
{
    /**
     * Menampilkan halaman admin
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function admin()
    {
        return view('admin');
    }

    /**
     * Menampilkan harga dalam format rupiah
     *
     * @return string
     */
    public function showPrice() {
        $harga = 75000;
        return Formatter::formatRupiah($harga);
    }
}
