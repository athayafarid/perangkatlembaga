@extends('layouts.admin.app')


@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Jabatan Lembaga</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Fitur Utama</a></li>
                                <li class="breadcrumb-item" aria-current="page">Data Jabatan Lembaga</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- FILTER & SEARCH SIMPLE --}}
            <div class="p-3 border-bottom bg-light">
                <form method="GET" action="{{ route('keluarga.index') }}" class="row g-2">

                    {{-- FILTER RT --}}
                    <div class="col-md-2">
                        <select name="rt" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">RT (Semua)</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}" {{ request('rt') == $i ? 'selected' : '' }}>RT
                                    {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    {{-- FILTER RW --}}
                    <div class="col-md-2">
                        <select name="rw" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">RW (Semua)</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}" {{ request('rw') == $i ? 'selected' : '' }}>RW
                                    {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    {{-- SEARCH --}}
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Cari No KK / Alamat / Kepala...">

                            <button class="btn btn-primary"><i class="bi bi-search"></i></button>

                            @if (request('search') || request('rt') || request('rw'))
                                <a href="{{ route('keluarga.index') }}" class="btn btn-outline-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </div>

                </form>
            </div>


            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>No KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Jumlah Anggota</th>
                            <th>Alamat</th>
                            <th>RT/RW</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->no_kk }}</td>
                                <td>{{ $k->kepala->nama ?? '-' }}</td>
                                <td>{{ $k->jumlah_anggota }}</td>
                                <td>{{ $k->alamat }}</td>
                                <td>{{ $k->rt }}/{{ $k->rw }}</td>
                                <td>
                                    <a href="{{ route('keluarga.edit', $k->keluarga_id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('keluarga.destroy', $k->keluarga_id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>

                    {{-- PAGINATION --}}
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted small">
                            Menampilkan {{ $data->count() }} dari {{ $data->total() }} entri
                        </div>

                        <div>
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1800,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
