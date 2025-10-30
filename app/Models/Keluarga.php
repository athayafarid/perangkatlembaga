<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'keluarga_id';
    protected $fillable = [
        'no_kk',
        'kepala_keluarga_id',
        'jumlah_anggota',
        'alamat',
        'rt',
        'rw',
    ];

    public function kepala()
    {
        return $this->belongsTo(Warga::class, 'kepala_keluarga_id', 'warga_id');
    }
}
