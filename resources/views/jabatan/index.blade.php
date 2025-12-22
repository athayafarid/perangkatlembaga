@extends('layouts.admin.app')
@section('content')
    <div class="pc-container jabatan-page rw-page">
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
                <div class="card card-custom">
                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <div class="header-text">
                            <h4>Data Jabatan Lembaga</h4>
                            <small>Kelola data jabatan lembaga dengan mudah</small>
                        </div>

                        <a href="{{ route('jabatan_lembaga.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus"></i> Tambah
                        </a>
                    </div>

                    <div class="card-body">

                        {{-- FILTER & SEARCH --}}
                        <form method="GET" action="{{ route('jabatan_lembaga.index') }}" class="row g-3 mb-4">

                            <div class="col-md-4">
                                <select name="lembaga_id" class="form-select" onchange="this.form.submit()">
                                    <option value="">Semua Lembaga</option>
                                    @foreach (\App\Models\LembagaDesa::all() as $l)
                                        <option value="{{ $l->lembaga_id }}"
                                            {{ request('lembaga_id') == $l->lembaga_id ? 'selected' : '' }}>
                                            {{ $l->nama_lembaga }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        value="{{ request('search') }}" placeholder="Cari nama jabatan atau level...">

                                    <button class="btn btn-primary">
                                        <i class="bi bi-search"></i>
                                    </button>

                                    @if (request('search') || request('lembaga_id'))
                                        <a href="{{ route('jabatan_lembaga.index') }}" class="btn btn-outline-secondary">
                                            Clear
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>


                        {{-- TABEL --}}
                        <div class="row g-4 rw-card-grid">
                            @forelse ($jabatan as $row)
                                <div class="col-md-6 col-xl-4">
                                    <div class="rw-card h-100">

                                        <!-- HEADER -->
                                        <div class="rw-card-header">
                                            <div class="rw-title">
                                                {{ $row->nama_jabatan }}
                                            </div>

                                            <div class="rw-actions">
                                                <a href="{{ route('jabatan_lembaga.edit', $row->jabatan_id) }}"
                                                    class="btn btn-icon btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <form action="{{ route('jabatan_lembaga.destroy', $row->jabatan_id) }}"
                                                    method="POST" class="d-inline form-delete">
                                                    @csrf @method('DELETE')
                                                    <button type="button" class="btn btn-icon btn-danger btn-delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        <div class="rw-card-body">
                                            <div class="rw-row">
                                                <span class="label">Lembaga</span>
                                                <span class="value">{{ $row->lembaga->nama_lembaga ?? '-' }}</span>
                                            </div>

                                            <div class="rw-row">
                                                <span class="label">Level</span>
                                                <span class="value">{{ $row->level ?? '-' }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center text-muted py-5">
                                    Belum ada data jabatan
                                </div>
                            @endforelse
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
