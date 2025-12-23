<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnggotaLembaga;
use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;
use App\Models\Warga;
use Illuminate\Http\Request;

class AnggotaLembagaController extends Controller
{
    public function index(Request $request)
    {
        $data = AnggotaLembaga::with(['lembaga', 'jabatan', 'warga'])
            ->search($request, [
                'warga.nama',
                'lembaga.nama_lembaga',
                'jabatan.nama_jabatan',
            ])
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('anggota.index', compact('data'));
    }

    public function create()
    {
        $lembaga = LembagaDesa::orderBy('nama_lembaga')->get();
        $jabatan = JabatanLembaga::orderBy('nama_jabatan')->get();
        $warga   = Warga::orderBy('nama')->get();

        return view('anggota.create', compact('lembaga', 'jabatan', 'warga'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'warga_id'    => 'required',
            'lembaga_id'  => 'required',
            'jabatan_id'  => 'required',
            'tgl_mulai'   => 'nullable',
            'tgl_selesai' => 'nullable',
            'keterangan'  => 'nullable',
        ]);

        AnggotaLembaga::create($data);

        return redirect()->route('anggota_lembaga.index')
            ->with('success', 'Anggota lembaga ditambahkan');
    }

    public function edit(AnggotaLembaga $anggota_lembaga)
    {
        return view('anggota.edit', [
            'anggota' => $anggota_lembaga,
            'warga'   => Warga::all(),
            'lembaga' => LembagaDesa::all(),
            'jabatan' => JabatanLembaga::all(),
        ]);
    }

    public function update(Request $request, AnggotaLembaga $anggota_lembaga)
    {
        $data = $request->validate([
            'warga_id'    => 'required',
            'lembaga_id'  => 'required',
            'jabatan_id'  => 'required',
            'tgl_mulai'   => 'nullable',
            'tgl_selesai' => 'nullable',
            'keterangan'  => 'nullable',
        ]);

        $anggota_lembaga->update($data);

        return redirect()->route('anggota_lembaga.index')
            ->with('success', 'Data diperbarui');
    }

    public function destroy(AnggotaLembaga $anggota_lembaga)
    {
        $anggota_lembaga->delete();
        return back()->with('success', 'Data dihapus');
    }
}
