<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'logo',
    ];

   

    public function scopeFilter(Builder $query, $request, array $columns)
    {
        return $query; // lembaga tidak punya filter
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
