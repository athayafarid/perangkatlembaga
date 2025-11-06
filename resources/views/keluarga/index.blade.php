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
            <div class="container mt-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bi bi-house-heart"></i> Data Keluarga</h4>
                        <a href="{{ route('keluarga.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
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
                                            <a href="{{ route('keluarga.edit', $k->keluarga_id) }}"
                                                class="btn btn-warning btn-sm">
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
