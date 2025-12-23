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
    public function edit(LembagaDesa $lembaga)
    {
        return view('lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, LembagaDesa $lembaga)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_lembaga', 'deskripsi']);

        if ($request->hasFile('logo')) {
            if ($lembaga->logo) {
                Storage::disk('public')->delete($lembaga->logo);
            }
            $data['logo'] = $request->file('logo')->store('logo_lembaga', 'public');
        }

        $lembaga->update($data);

        return redirect()
            ->route('lembaga_desa.index')
            ->with('success', 'Data lembaga diperbarui');
    }

    /* =========================
       DELETE
    ========================= */
    public function destroy(LembagaDesa $lembaga)
    {
        if ($lembaga->logo) {
            Storage::disk('public')->delete($lembaga->logo);
        }

        $lembaga->delete();

        return back()->with('success', 'Data lembaga dihapus');
    }
}
