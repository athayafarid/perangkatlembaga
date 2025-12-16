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
        $lembaga = LembagaDesa::all();
        return view('jabatan.create', compact('lembaga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'level'        => 'nullable|string|max:255',
            'lembaga_id'   => 'required|exists:lembaga_desa,lembaga_id',
        ]);

        JabatanLembaga::create($request->all());

        return redirect()->route('jabatan_lembaga.index')
            ->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jabatan = JabatanLembaga::findOrFail($id);
        $lembaga = LembagaDesa::all();

        return view('jabatan.edit', compact('jabatan','lembaga'));
    }

    public function update(Request $request, $id)
    {
        $jabatan = JabatanLembaga::findOrFail($id);

        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'level'        => 'nullable|string|max:255',
            'lembaga_id'   => 'required|exists:lembaga_desa,lembaga_id',
        ]);

        $jabatan->update($request->all());

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
