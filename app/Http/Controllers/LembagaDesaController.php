<?php
namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class LembagaDesaController extends Controller
{
    public function index(Request $request)
    {
        $data = LembagaDesa::when($request->q, function ($query) use ($request) {
                $query->where('nama_lembaga', 'like', '%' . $request->q . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('lembaga.index', compact('data'));
    }

    public function create()
    {
        return view('lembaga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'keterangan'   => 'nullable|string',
        ]);

        LembagaDesa::create($request->all());

        return redirect()
            ->route('lembaga_desa.index')
            ->with('success', 'Lembaga berhasil ditambahkan!');
    }

    public function edit(LembagaDesa $lembaga)
    {
        return view('lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, LembagaDesa $lembaga)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'keterangan'   => 'nullable|string',
        ]);

        $lembaga->update($request->all());

        return redirect()
            ->route('lembaga_desa.index')
            ->with('success', 'Data lembaga berhasil diperbarui!');
    }

    public function destroy(LembagaDesa $lembaga)
    {
        $lembaga->delete();

        return redirect()
            ->route('lembaga_desa.index')
            ->with('success', 'Data lembaga berhasil dihapus!');
    }
}

