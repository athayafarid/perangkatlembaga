<?php
namespace App\Http\Controllers;

use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class JabatanLembagaController extends Controller
{
    public function index(Request $request)
    {
        $query = JabatanLembaga::with('lembaga');

        // Filter by lembaga
        if ($request->filled('lembaga_id')) {
            $query->where('lembaga_id', $request->lembaga_id);
        }

        // Search by nama_jabatan or level
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_jabatan', 'LIKE', "%$search%")
                    ->orWhere('level', 'LIKE', "%$search%");
            });
        }

        $jabatan = $query->paginate(10)->withQueryString();

        return view('jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view('jabatan.create', [
            'lembaga' => LembagaDesa::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'lembaga_id'   => 'required|exists:lembaga_desa,lembaga_id',
            'level'        => 'nullable|string|max:255',
        ]);

        JabatanLembaga::create($data);

        return redirect()->route('jabatan_lembaga.index')
            ->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        return view('jabatan.edit', [
            'jabatan' => JabatanLembaga::findOrFail($id),
            'lembaga' => LembagaDesa::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $jabatan = JabatanLembaga::findOrFail($id);

        $data = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'lembaga_id'   => 'required|exists:lembaga_desa,lembaga_id',
            'level'        => 'nullable|string|max:255',
        ]);

        $jabatan->update($data);

        return redirect()->route('jabatan_lembaga.index')
            ->with('success', 'Data jabatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jabatan = JabatanLembaga::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan_lembaga.index')
            ->with('success', 'Data jabatan berhasil dihapus!');
    }
}
