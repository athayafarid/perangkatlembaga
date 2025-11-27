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
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('perangkat.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('perangkat.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required',
            'foto'    => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $input['foto'] = $request->file('foto')->store('foto_perangkat', 'public');
        }

        PerangkatDesa::create($input);

        return redirect()->route('perangkat.index')->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data  = PerangkatDesa::findOrFail($id);
        $warga = Warga::all();
        return view('perangkat.edit', compact('data', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $data  = PerangkatDesa::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('foto')) {
            if ($data->foto) {
                Storage::disk('public')->delete($data->foto);
            }

            $input['foto'] = $request->file('foto')->store('foto_perangkat', 'public');
        }

        $data->update($input);

        return redirect()->route('perangkat.index')->with('success', 'Data perangkat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = PerangkatDesa::findOrFail($id);
        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }

        $data->delete();

        return redirect()->route('perangkat.index')->with('success', 'Perangkat desa berhasil dihapus!');
    }
}
