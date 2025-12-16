<?php
namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;

class RtController extends Controller
{
    public function index(Request $request)
    {
        $data = Rt::with(['rw', 'ketuaRt'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('rt.index', compact('data'));
    }

    public function create()
    {
        $rw    = Rw::all();
        $warga = Warga::all();
        return view('rt.create', compact('rw', 'warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_rt' => 'required',
            'rw_id'    => 'required',
        ]);

        Rt::create($request->all());

        return redirect()->route('rt.index')->with('success', 'Data RT berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $rt    = Rt::findOrFail($id);
        $rw    = Rw::all();
        $warga = Warga::all();
        return view('rt.edit', compact('rt', 'rw', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $rt = Rt::findOrFail($id);
        $rt->update($request->all());

        return redirect()->route('rt.index')->with('success', 'Data RT berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Rt::destroy($id);
        return redirect()->route('rt.index')->with('success', 'Data RT berhasil dihapus!');
    }
}
