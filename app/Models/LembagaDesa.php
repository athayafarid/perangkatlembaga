<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembagaDesa extends Model
{
    use HasFactory;

    protected $table = 'lembaga_desa';
    protected $primaryKey = 'lembaga_id';
    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
        'kontak',
        'logo'
    ];

    public function jabatanLembaga()
    {
        return $this->hasMany(JabatanLembaga::class, 'lembaga_id', 'lembaga_id');
    }

    public function anggotaLembaga()
    {
        return $this->hasMany(AnggotaLembaga::class, 'lembaga_id', 'lembaga_id');
    }
}
