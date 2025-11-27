<?php
namespace App\Http\Controllers;

use App\Models\AnggotaLembaga;
use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class AnggotaLembagaController extends Controller
{
    public function index(Request $request)
    {
        $data = AnggotaLembaga::with(['lembaga', 'jabatan'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('anggota.index', compact('data'));
    }

    public function create()
    {
        $lembaga = LembagaDesa::all();
        $jabatan = JabatanLembaga::all();
        return view('anggota.create', compact('lembaga', 'jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatan_lembagas,id',
            'lembaga_id' => 'required|exists:lembaga_desas,id',
            'no_telp'    => 'nullable|string|max:15',
            'email'      => 'nullable|email',
            'alamat'     => 'nullable|string',
        ]);

        AnggotaLembaga::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(AnggotaLembaga $anggota)
    {
        $lembaga = LembagaDesa::all();
        $jabatan = JabatanLembaga::all();
        return view('anggota.edit', compact('anggota', 'lembaga', 'jabatan'));
    }

    public function update(Request $request, AnggotaLembaga $anggota)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatan_lembagas,id',
            'lembaga_id' => 'required|exists:lembaga_desas,id',
            'no_telp'    => 'nullable|string|max:15',
            'email'      => 'nullable|email',
            'alamat'     => 'nullable|string',
        ]);

        $anggota->update($request->all());
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(AnggotaLembaga $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}
