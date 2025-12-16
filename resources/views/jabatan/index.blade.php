@extends('layouts.admin.app')
@section('content')

<div class="pc-container">
    <div class="pc-content">

        <!-- Breadcrumb -->
        <div class="page-header">
            <div class="page-block">
                <h5>Data Jabatan Lembaga</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                    <li class="breadcrumb-item">Data Jabatan Lembaga</li>
                </ul>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card shadow border-0">

                <!-- HEADER CARD -->
                <div class="card-header d-flex justify-content-between align-items-center text-white"
                    style="background:#0d6efd;">
                    <div>
                        <h4 class="mb-0">Data Jabatan Lembaga</h4>
                        <small>Kelola data jabatan lembaga dengan mudah</small>
                    </div>

                    <a href="{{ route('jabatan_lembaga.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus"></i> Tambah
                    </a>
                </div>

                <div class="card-body">

                    {{-- FILTER & SEARCH --}}
                    <form method="GET" action="{{ route('jabatan_lembaga.index') }}" class="row mb-3 g-2">

                        <!-- FILTER LEMBAGA -->
                        <div class="col-md-3">
                            <select name="lembaga_id" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="">Semua Lembaga</option>

                                @foreach (\App\Models\LembagaDesa::all() as $l)
                                    <option value="{{ $l->lembaga_id }}"
                                        {{ request('lembaga_id') == $l->lembaga_id ? 'selected' : '' }}>
                                        {{ $l->nama_lembaga }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SEARCH -->
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control form-control-sm"
                                       value="{{ request('search') }}"
                                       placeholder="Cari nama jabatan atau level...">

                                <button class="btn btn-primary btn-sm">
                                    <i class="bi bi-search"></i>
                                </button>

                                @if (request('search') || request('lembaga_id'))
                                    <a href="{{ route('jabatan_lembaga.index') }}"
                                        class="btn btn-outline-secondary btn-sm">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>

                    {{-- TABEL --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th style="width:60px">No</th>
                                    <th>Nama Jabatan</th>
                                    <th>Lembaga</th>
                                    <th>Level</th>
                                    <th class="text-center" style="width:150px;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($jabatan as $row)
                                    <tr>
                                        <td>{{ ($jabatan->currentPage() - 1) * $jabatan->perPage() + $loop->iteration }}</td>
                                        <td>{{ $row->nama_jabatan }}</td>
                                        <td>{{ $row->lembaga->nama_lembaga ?? '-' }}</td>
                                        <td>{{ $row->level ?? '-' }}</td>

                                        <td class="text-center">

                                            <a href="{{ route('jabatan_lembaga.edit', $row->jabatan_id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('jabatan_lembaga.destroy', $row->jabatan_id) }}"
                                                  method="POST" class="d-inline form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm btn-delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-3">
                                            Belum ada data jabatan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <div class="d-flex justify-content-between align-items-center mt-2 flex-wrap">
                        <small class="text-muted">
                            Menampilkan {{ $jabatan->count() }} dari {{ $jabatan->total() }} entri
                        </small>

                        {{ $jabatan->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        {{-- Confirm Delete --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll(".btn-delete").forEach(btn => {
                    btn.addEventListener("click", function() {
                        const form = this.closest("form");

                        Swal.fire({
                            title: "Hapus data ini?",
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Ya, hapus!",
                            cancelButtonText: "Batal"
                        }).then((res) => {
                            if (res.isConfirmed) form.submit();
                        });
                    });
                });
            });
        </script>

    </div>
</div>

@endsection
