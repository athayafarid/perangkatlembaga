<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index()
    {
        $data = Keluarga::with('kepala')->latest()->paginate(10);
        return view('keluarga.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('keluarga.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|unique:keluarga',
            'alamat' => 'required',
        ]);

        Keluarga::create($request->all());

        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Keluarga::findOrFail($id);
        $warga = Warga::all();
        return view('keluarga.edit', compact('data', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $data = Keluarga::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Keluarga::findOrFail($id)->delete();
        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil dihapus!');
    }
}
