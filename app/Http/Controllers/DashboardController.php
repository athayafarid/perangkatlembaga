<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnggotaLembaga;
use App\Models\JabatanLembaga;

use App\Models\LembagaDesa;
use App\Models\PerangkatDesa;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('admin.dashboard', [
            'warga'     => Warga::count(),

            'rt'        => Rt::count(),
            'rw'        => Rw::count(),
            'perangkat' => PerangkatDesa::count(),
            'lembaga'   => LembagaDesa::count(),
            'jabatan'   => JabatanLembaga::count(),
            'anggota'   => AnggotaLembaga::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
