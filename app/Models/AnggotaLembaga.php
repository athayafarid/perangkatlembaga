<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AnggotaLembaga extends Model
{
    protected $table = 'anggota_lembaga';
    protected $primaryKey = 'anggota_id';

    protected $fillable = [
        'lembaga_id',
        'warga_id',
        'jabatan_id',
        'tgl_mulai',
        'tgl_selesai',
        'keterangan'
    ];

    public function getRouteKeyName()
    {
        return 'anggota_id';
    }

    public function lembaga()
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(JabatanLembaga::class, 'jabatan_id');
    }


    /* ===========================
       FILTER (dropdown)
    ============================*/
    public function scopeFilter(Builder $query, $request, array $columns)
    {
        foreach ($columns as $col) {
            if ($request->filled($col)) {
                $query->where($col, $request->input($col));
            }
        }

        return $query;
    }

    /* ===========================
       SEARCH (LIKE)
       Mencari:
       - nama warga
       - nama lembaga
       - nama jabatan
    ============================*/
    public function scopeSearch(Builder $query, $request, array $columns)
    {
        if (!$request->filled('search')) {
            return $query;
        }

        $search = $request->search;

        return $query->where(function ($q) use ($search, $columns) {

            foreach ($columns as $col) {

                // Jika kolom berasal dari relasi
                if ($col === 'warga.nama') {
                    $q->orWhereHas('warga', function ($q2) use ($search) {
                        $q2->where('nama', 'LIKE', '%' . $search . '%');
                    });
                }

                elseif ($col === 'lembaga.nama_lembaga') {
                    $q->orWhereHas('lembaga', function ($q2) use ($search) {
                        $q2->where('nama_lembaga', 'LIKE', '%' . $search . '%');
                    });
                }

                elseif ($col === 'jabatan.nama_jabatan') {
                    $q->orWhereHas('jabatan', function ($q2) use ($search) {
                        $q2->where('nama_jabatan', 'LIKE', '%' . $search . '%');
                    });
                }

                // Jika kolom di tabel sendiri
                else {
                    $q->orWhere($col, 'LIKE', '%' . $search . '%');
                }
            }

        });
    }
}
