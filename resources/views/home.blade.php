<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Organisasi Desa</title>
    <!-- Menggunakan Tailwind CSS untuk tampilan modern dan responsif -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fc;
        }
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
        }
        th {
            cursor: default;
        }
    </style>
</head>
<body>

<div class="container mx-auto p-4 sm:p-8">

    <!-- Greeting -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">
        Dashboard {{ $nama ?? 'Pengunjung' }}
    </h1>
    <p class="text-xl font-semibold text-indigo-600 mb-8">Data Organisasi Desa Suka Maju</p>

    <!-- RW (Rukun Warga) -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4 mt-10">Data Rukun Warga (RW)</h2>
    <div class="overflow-x-auto card-shadow bg-white rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nomor RW</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ketua (Warga ID)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Keterangan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($rw ?? [] as $r)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $r['rw_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-bold">{{ $r['nomor_rw'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $r['ketua_rw_warga_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $r['keterangan'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Data RW kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- RT (Rukun Tetangga) -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4 mt-10">Data Rukun Tetangga (RT)</h2>
    <div class="overflow-x-auto card-shadow bg-white rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">RW ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nomor RT</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ketua (Warga ID)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Keterangan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($rt ?? [] as $t)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $t['rt_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $t['rw_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-bold">{{ $t['nomor_rt'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $t['ketua_rt_warga_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $t['keterangan'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Data RT kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Perangkat Desa -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4 mt-10">Perangkat Desa</h2>
    <div class="overflow-x-auto card-shadow bg-white rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Warga ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">NIP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kontak</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Selesai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Foto</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($perangkat_desa ?? [] as $p)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $p['perangkat_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $p['nama'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $p['warga_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $p['jabatan'] }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $p['nip'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $p['kontak'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $p['periode_mulai'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $p['periode_selesai'] ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $p['foto'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">Data Perangkat Desa kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Lembaga Desa -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4 mt-10">Lembaga Desa</h2>
    <div class="overflow-x-auto card-shadow bg-white rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Lembaga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kontak</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Logo</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($lembaga_desa ?? [] as $l)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $l['lembaga_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-semibold">{{ $l['nama_lembaga'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $l['deskripsi'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $l['kontak'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $l['logo'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Data Lembaga Desa kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Jabatan Lembaga -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4 mt-10">Jabatan Lembaga</h2>
    <div class="overflow-x-auto card-shadow bg-white rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jabatan ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Lembaga ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Level</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($jabatan_lembaga ?? [] as $j)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $j['jabatan_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $j['lembaga_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $j['nama_jabatan'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $j['level'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Data Jabatan Lembaga kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Anggota Lembaga -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4 mt-10">Anggota Lembaga</h2>
    <div class="overflow-x-auto card-shadow bg-white rounded-lg mb-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Anggota ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Lembaga ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Warga ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jabatan ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($anggota_lembaga ?? [] as $a)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $a['anggota_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a['lembaga_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a['warga_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a['jabatan_id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a['tgl_mulai'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a['tgl_selesai'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Data Anggota Lembaga kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
