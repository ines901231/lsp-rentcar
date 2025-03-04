<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Model untuk tabel "transaksis"
 * 
 * @property int $id
 * @property int $user_id
 * @property int $mobil_id
 * @property string $nama
 * @property string $ponsel
 * @property string $alamat
 * @property int $lama
 * @property string $tgl_pesan
 * @property int $total
 * @property string $status
 */
class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string Nama tabel yang digunakan oleh model
     */
    protected $table='transaksis';
    /**
     * @var string Primary key dari tabel
     */
    protected $primaryKey='id';
    /**
     * @var array Kolom yang dapat diisi secara massal
     */
    protected $fillable=['id', 'user_id', 'mobil_id', 'nama', 'ponsel', 'alamat', 'lama', 'tgl_pesan', 'total', 'status'];

    /**
     * Relasi dengan model User
     * 
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan model Mobil
     * 
     * @return BelongsTo
     */
    public function mobil():BelongsTo
    {
        return $this->belongsTo(Mobil::class);
    }
}
