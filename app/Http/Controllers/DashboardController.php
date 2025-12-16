<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.dashboard");
           $totalWarga = Warga::count();

        // Hitung berdasarkan gender
        $totalLaki = Warga::where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Warga::where('jenis_kelamin', 'Perempuan')->count();

        // Hitung agama
        $agama = Warga::selectRaw('agama, COUNT(*) as total')
                        ->groupBy('agama')
                        ->get();

        // 5 data warga terbaru
        $recent = Warga::orderBy('warga_id', 'DESC')->take(5)->get();

        return view('admin.dashboard.index', [
            'totalWarga'      => $totalWarga,
            'totalLaki'       => $totalLaki,
            'totalPerempuan'  => $totalPerempuan,
            'agama'           => $agama,
            'recent'          => $recent,
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
