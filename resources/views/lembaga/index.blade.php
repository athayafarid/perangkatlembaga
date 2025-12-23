@extends('layouts.admin.app')
@section('title', 'Data Lembaga Desa')

@section('content')
    <div class="pc-container lembaga-page rw-page">
        <div class="pc-content">

            {{-- PAGE HEADER (SAMAKAN DENGAN PERANGKAT) --}}
            <div class="page-header">
                <div class="page-block">
                    <h5>Data Lembaga Desa</h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                        <li class="breadcrumb-item">Lembaga Desa</li>
                    </ul>
                </div>
            </div>

            <div class="container mt-4">
                <div class="card card-custom">

                    {{-- CARD HEADER --}}
                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <div class="header-text">
                            <h4>Data Lembaga Desa</h4>
                            <small>Kelola data lembaga desa</small>
                        </div>

                        <a href="{{ route('lembaga_desa.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus"></i> Tambah
                        </a>
                    </div>

                    <div class="card-body">

                        {{-- SEARCH (POSISI & UKURAN SAMA) --}}
                        <form method="GET" class="mb-3">
                            <div class="input-group" style="max-width:320px;">
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                    placeholder="Cari nama lembaga...">
                                <button class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>

                                @if (request('q'))
                                    <a href="{{ route('lembaga_desa.index') }}" class="btn btn-outline-secondary">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </form>

                        {{-- CARD GRID --}}
                        <div class="row g-4 rw-card-grid">
                            @forelse($data as $l)
                                <div class="col-md-6 col-xl-4">
                                    <div class="rw-card h-100">

                                        {{-- HEADER --}}
                                        <div class="rw-card-header">
                                            <div class="rw-title d-flex align-items-center gap-2">
                                                @if ($l->logo)
                                                    <img src="{{ asset('storage/' . $l->logo) }}"
                                                        class="rounded-circle object-fit-cover" width="36"
                                                        height="36">
                                                @else
                                                    <div class="rounded-circle bg-secondary text-white
                                                            d-flex align-items-center justify-content-center"
                                                        style="width:36px;height:36px;">
                                                        <i class="bi bi-building"></i>
                                                    </div>
                                                @endif

                                                <span>{{ $l->nama_lembaga }}</span>
                                            </div>

                                            <div class="rw-actions">
                                                @if (auth()->user()->role === 'Admin')
                                                    <a href="{{ route('lembaga_desa.edit', $l->lembaga_id) }}"
                                                        class="btn btn-icon btn-warning">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('lembaga_desa.destroy', $l->lembaga_id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-icon btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>

                                        </div>

                                        {{-- BODY --}}
                                        <div class="rw-card-body">
                                            <div class="rw-desc">
                                                {{ $l->deskripsi ?? 'Tidak ada deskripsi' }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center text-muted py-5">
                                    Tidak ada data ditemukan
                                </div>
                            @endforelse
                        </div>

                        {{-- PAGINATION --}}
                        <div class="d-flex justify-content-end mt-3">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
