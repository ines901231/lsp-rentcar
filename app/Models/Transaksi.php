<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='mobils';
    protected $primaryKey='id';
    protected $fillable=['id', 'user_id', 'mobil_id', 'nama', 'ponsel', 'alamat', 'lama', 'tgl_pesan', 'total', 'status'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mobil():BelongsTo
    {
        return $this->belongsTo(Mobil::class);
    }
}
