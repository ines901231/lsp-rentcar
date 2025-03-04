<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model untuk tabel "mobils"
 * 
 * @property int $id
 * @property int $user_id
 * @property string $nopolisi
 * @property string $merk
 * @property string $jenis
 * @property int $kapasitas
 * @property int $harga
 * @property string|null $foto
 * 
 * @method static create(array $attributes)
 */
class Kendaraan extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * @var string Nama tabel yang digunakan oleh model
     */
    protected $table='mobils';
     /**
     * @var string Primary key dari tabel
     */
    protected $primaryKey='id';
    /**
     * @var array Kolom yang dapat diisi secara massal
     */
    protected $fillable=['id', 'user_id', 'nopolisi', 'merk', 'jenis', 'kapasitas', 'harga', 'foto'];

    /**
     * Relasi dengan model User
     * 
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
