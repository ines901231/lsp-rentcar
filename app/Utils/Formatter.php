<?php

namespace App\Utils;

class Formatter {
    public static function formatRupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}
