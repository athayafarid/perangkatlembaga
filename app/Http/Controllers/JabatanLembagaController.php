<?php

namespace App\Http\Controllers;

use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class JabatanLembagaController extends Controller
{
    public function index()
    {
        $jabatan = JabatanLembaga::with('lembaga')->get();
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
            'deskripsi' => 'nullable|string',
            'lembaga_id' => 'required|exists:lembaga_desas,id'
        ]);

        JabatanLembaga::create($request->all());
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function edit(JabatanLembaga $jabatan)
    {
        $lembaga = LembagaDesa::all();
        return view('jabatan.edit', compact('jabatan', 'lembaga'));
    }

    public function update(Request $request, JabatanLembaga $jabatan)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lembaga_id' => 'required|exists:lembaga_desas,id'
        ]);

        $jabatan->update($request->all());
        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diperbarui!');
    }

    public function destroy(JabatanLembaga $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil dihapus!');
    }
}
