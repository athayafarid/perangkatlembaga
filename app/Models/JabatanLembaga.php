<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanLembaga extends Model
{
    use HasFactory;

    protected $table      = 'jabatan_lembaga';
    protected $primaryKey = 'jabatan_id';

    protected $fillable = [
        'lembaga_id',
        'nama_jabatan',
        'level',
    ];

    // Relasi ke Lembaga
    public function lembaga()
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_id', 'lembaga_id');
    }

    /* ------ FILTER ------ */
    public function scopeFilter(Builder $query, $request, array $columns)
    {
        foreach ($columns as $col) {
            if ($request->filled($col)) {
                $query->where($col, $request->$col);
            }
        }
        return $query;
    }

    /* ------ SEARCH ------ */
    public function scopeSearch(Builder $query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
        return $query;
    }
}
