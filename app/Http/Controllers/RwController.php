<?php
namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function index(Request $request)
    {
        $data = Rw::with('ketuaRw')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('rw.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('rw.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_rw' => 'required|unique:rw,nomor_rw',
        ]);

        Rw::create($request->all());
        return redirect()->route('rw.index')->with('success', 'Data RW berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rw    = Rw::findOrFail($id);
        $warga = Warga::all();
        return view('rw.edit', compact('rw', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $rw = Rw::findOrFail($id);
        $rw->update($request->all());

        return redirect()->route('rw.index')->with('success', 'Data RW berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Rw::destroy($id);
        return redirect()->route('rw.index')->with('success', 'Data RW berhasil dihapus.');
    }
}
