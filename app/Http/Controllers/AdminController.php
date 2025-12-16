<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()

    {
        
        $rw = [
            [
                'rw_id' => 1,
                'nomor_rw' => '01',
                'ketua_rw_warga_id' => 1001, 
                'keterangan' => 'Wilayah Utara Desa Suka Maju'
            ],
            [
                'rw_id' => 2,
                'nomor_rw' => '02',
                'ketua_rw_warga_id' => 1002, 
                'keterangan' => 'Wilayah Selatan Desa Suka Maju'
            ],
        ];

        // --- Tabel RT ---
        $rt = [
            [
                'rt_id' => 10,
                'rw_id' => 1,
                'nomor_rt' => '001',
                'ketua_rt_warga_id' => 1003,
                'keterangan' => 'RT 001/01'
            ],
            [
                'rt_id' => 20,
                'rw_id' => 1,
                'nomor_rt' => '002',
                'ketua_rt_warga_id' => 1004,
                'keterangan' => 'RT 002/01'
            ],
            [
                'rt_id' => 30,
                'rw_id' => 2,
                'nomor_rt' => '001',
                'ketua_rt_warga_id' => 1005,
                'keterangan' => 'RT 001/02'
            ],
        ];

        // --- Tabel Perangkat Desa ---
        $perangkat_desa = [
            [
                'perangkat_id' => 100,
                'nama' => 'Budi Santoso',
                'warga_id' => 1006,
                'jabatan' => 'Kepala Desa',
                'nip' => '198001012000011001',
                'kontak' => '081122334455',
                'periode_mulai' => '2020-01-01',
                'periode_selesai' => '2026-01-01',
                'foto' => 'media/budi.jpg'
            ],
            [
                'perangkat_id' => 101,
                'nama' => 'Siti Aminah',
                'warga_id' => 1007,
                'jabatan' => 'Sekretaris Desa',
                'nip' => '198505152005022002',
                'kontak' => '081234567890',
                'periode_mulai' => '2022-03-01',
                'periode_selesai' => '2028-03-01',
                'foto' => 'media/siti.jpg'
            ],
        ];

        // --- Tabel Lembaga Desa ---
        $lembaga_desa = [
            [
                'lembaga_id' => 201,
                'nama_lembaga' => 'Badan Permusyawaratan Desa (BPD)',
                'deskripsi' => 'Lembaga perwujudan demokrasi desa.',
                'kontak' => 'bpd_desa@mail.com',
                'logo' => 'media/logo_bpd.png'
            ],
            [
                'lembaga_id' => 202,
                'nama_lembaga' => 'Karang Taruna Tunas Bangsa',
                'deskripsi' => 'Organisasi kepemudaan desa.',
                'kontak' => 'karangtaruna@mail.com',
                'logo' => 'media/logo_karangtaruna.png'
            ],
        ];

        // --- Tabel Jabatan Lembaga ---
        $jabatan_lembaga = [
            [
                'jabatan_id' => 301,
                'lembaga_id' => 201, 
                'nama_jabatan' => 'Ketua BPD',
                'level' => 1
            ],
            [
                'jabatan_id' => 303,
                'lembaga_id' => 202,
                'nama_jabatan' => 'Ketua Karang Taruna',
                'level' => 1
            ],
        ];

        // --- Tabel Anggota Lembaga ---
        $anggota_lembaga = [
            [
                'anggota_id' => 401,
                'lembaga_id' => 201,
                'warga_id' => 1008, 
                'jabatan_id' => 301,
                'tgl_mulai' => '2023-01-01',
                'tgl_selesai' => '2028-12-31'
            ],
            [
                'anggota_id' => 402,
                'lembaga_id' => 202,
                'warga_id' => 1009,
                'jabatan_id' => 303,
                'tgl_mulai' => '2024-03-01',
                'tgl_selesai' => null
            ],
        ];


        // Kirim semua data organisasi desa ke view
        // Perbaikan: $nama diset default, dan dead code dihapus.
        return view('home', [
            'nama' => 'Admin Organisasi Desa', 
            'rw' => $rw,
            'rt' => $rt,
            'perangkat_desa' => $perangkat_desa,
            'lembaga_desa' => $lembaga_desa,
            'jabatan_lembaga' => $jabatan_lembaga,
            'anggota_lembaga' => $anggota_lembaga
        ]);
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $nama) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}

    // Method lainnya dikosongkan/dipertahankan sesuai template
    public function data($nama = null)
    {
        return view('home', [
            'nama' => $nama ?? 'Pengunjung',
            'destinasi_wisata' => [],
        ]);
    }
    
    public function showData($nama = null)
    {
        $destinasi_wisata = [];
        $homestay = [];
        $kamar_homestay = [];
        $booking_homestay = [];
        $ulasan_wisata = [];

        return view('home', compact('nama', 'destinasi_wisata', 'homestay', 'kamar_homestay', 'booking_homestay', 'ulasan_wisata'));
    }
}
