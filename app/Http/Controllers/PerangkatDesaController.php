<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index(Request $request)
    {
        $data = PerangkatDesa::with('warga')
            ->when($request->q, function ($query) use ($request) {
                $query->where('jabatan', 'like', '%' . $request->q . '%')
                      ->orWhereHas('warga', function ($q) use ($request) {
                          $q->where('nama', 'like', '%' . $request->q . '%');
                      });
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('perangkat.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::orderBy('nama')->get();
        return view('perangkat.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'warga_id' => 'nullable',
            'jabatan' => 'required|string|max:100',
            'periode_mulai' => 'nullable|string|max:50',
            'periode_selesai' => 'nullable|string|max:50',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_perangkat', 'public');
        }

        PerangkatDesa::create($validated);

        return redirect()
            ->route('perangkat_desa.index')
            ->with('success', 'Perangkat desa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = PerangkatDesa::findOrFail($id);
        $warga = Warga::orderBy('nama')->get();

        return view('perangkat.edit', compact('data', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $data = PerangkatDesa::findOrFail($id);

        $validated = $request->validate([
            'warga_id' => 'nullable',
            'jabatan' => 'required|string|max:100',
            'periode_mulai' => 'nullable|string|max:50',
            'periode_selesai' => 'nullable|string|max:50',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($data->foto) {
                Storage::disk('public')->delete($data->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_perangkat', 'public');
        }

        $data->update($validated);

        return redirect()
            ->route('perangkat_desa.index')
            ->with('success', 'Data perangkat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = PerangkatDesa::findOrFail($id);

        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }

        $data->delete();

        return redirect()
            ->route('perangkat_desa.index')
            ->with('success', 'Perangkat desa berhasil dihapus');
    }
}
