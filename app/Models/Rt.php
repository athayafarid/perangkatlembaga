<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Rt extends Model
{
    use HasFactory;

    protected $table = 'rt';
    protected $primaryKey = 'rt_id';

    protected $fillable = [
        'rw_id',
        'nomor_rt',
        'ketua_rt_warga_id',
        'keterangan'
    ];

    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'rw_id');
    }

    public function ketuaRt()
    {
        return $this->belongsTo(Warga::class, 'ketua_rt_warga_id', 'warga_id');
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
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
        return $query;
    }
}
