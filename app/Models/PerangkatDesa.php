<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $table = 'perangkat_desa';
    protected $primaryKey = 'perangkat_id';

    protected $fillable = [
        'warga_id',
        'jabatan',
        'nip',
        'kontak',
        'periode_mulai',
        'periode_selesai',
        'foto'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    public function scopeFilter(Builder $query, $request, array $columns)
    {
        foreach ($columns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    public function scopeSearch(Builder $query, $request, array $columns)
    {
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request, $columns) {

                foreach ($columns as $column) {

                    // kalau search berasal dari relasi warga
                    if ($column === 'warga.nama') {
                        $q->orWhereHas('warga', function ($q2) use ($request) {
                            $q2->where('nama', 'LIKE', '%' . $request->search . '%');
                        });
                    } else {
                        $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                    }

                }
            });
        }
        return $query;
    }
}
