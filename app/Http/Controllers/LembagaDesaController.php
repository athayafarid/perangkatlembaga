<?php

namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LembagaDesaController extends Controller
{
    public function index(Request $request)
    {
        $data = LembagaDesa::when($request->q, function ($q) use ($request) {
                $q->where('nama_lembaga', 'LIKE', '%' . $request->q . '%');
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('lembaga.index', compact('data'));
    }

    /* =========================
       CREATE
    ========================= */
    public function create()
    {
        return view('lembaga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_lembaga', 'deskripsi']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logo_lembaga', 'public');
        }

        LembagaDesa::create($data);

        return redirect()
            ->route('lembaga_desa.index')
            ->with('success', 'Lembaga berhasil ditambahkan');
    }

    /* =========================
       EDIT
    ========================= */
    public function edit(LembagaDesa $lembaga_desa)
    {
        return view('lembaga.edit', compact('lembaga_desa'));
    }

    public function update(Request $request, LembagaDesa $lembaga_desa)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_lembaga', 'deskripsi']);

        if ($request->hasFile('logo')) {
            if ($lembaga_desa->logo) {
                Storage::disk('public')->delete($lembaga_desa->logo);
            }
            $data['logo'] = $request->file('logo')->store('logo_lembaga', 'public');
        }

        $lembaga_desa->update($data);

        return redirect()
            ->route('lembaga_desa.index')
            ->with('success', 'Data lembaga diperbarui');
    }

    /* =========================
       DELETE
    ========================= */
    public function destroy(LembagaDesa $lembaga_desa)
    {
        if ($lembaga_desa->logo) {
            Storage::disk('public')->delete($lembaga_desa->logo);
        }

        $lembaga_desa->delete();

        return back()->with('success', 'Data lembaga dihapus');
    }
}
