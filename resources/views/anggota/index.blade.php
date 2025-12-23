@extends('layouts.admin.app')
@section('title', 'Data Anggota Lembaga')

@section('content')
<div class="pc-container anggota-page rw-page">
    <div class="pc-content">

        {{-- PAGE HEADER --}}
        <div class="page-header">
            <div class="page-block">
                <h5>Data Anggota Lembaga</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                    <li class="breadcrumb-item">Anggota Lembaga</li>
                </ul>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card card-custom">

                {{-- CARD HEADER --}}
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <div class="header-text">
                        <h4>Data Anggota Lembaga</h4>
                        <small>Kelola data anggota lembaga desa</small>
                    </div>

                    <a href="{{ route('anggota_lembaga.create') }}"
                       class="btn btn-light btn-sm">
                        <i class="bi bi-plus"></i> Tambah
                    </a>
                </div>

                <div class="card-body">

                    {{-- SEARCH --}}
                    <form method="GET" class="mb-3">
                        <div class="input-group" style="max-width:320px;">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   class="form-control"
                                   placeholder="Cari anggota...">
                            <button class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>

                            @if(request('search'))
                                <a href="{{ route('anggota_lembaga.index') }}"
                                   class="btn btn-outline-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    {{-- CARD GRID --}}
                    <div class="row g-4 rw-card-grid">
                        @forelse($data as $a)
                            <div class="col-md-6 col-xl-4">
                                <div class="rw-card h-100">

                                    {{-- HEADER --}}
                                    <div class="rw-card-header">
                                        <div class="rw-title d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-secondary text-white
                                                        d-flex align-items-center justify-content-center"
                                                 style="width:36px;height:36px;">
                                                <i class="bi bi-person"></i>
                                            </div>

                                            <span>{{ $a->warga->nama ?? '-' }}</span>
                                        </div>

                                        <div class="rw-actions">
                                            <a href="{{ route('anggota_lembaga.edit', $a->anggota_id) }}"
                                               class="btn btn-icon btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('anggota_lembaga.destroy', $a->anggota_id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-icon btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- BODY --}}
                                    <div class="rw-card-body">
                                        <div class="rw-row">
                                            <span class="label">Lembaga</span>
                                            <span class="value">{{ $a->lembaga->nama_lembaga ?? '-' }}</span>
                                        </div>

                                        <div class="rw-row">
                                            <span class="label">Jabatan</span>
                                            <span class="value">{{ $a->jabatan->nama_jabatan ?? '-' }}</span>
                                        </div>

                                        <div class="rw-row">
                                            <span class="label">Periode</span>
                                            <span class="value">
                                                {{ $a->tgl_mulai ?? '-' }} – {{ $a->tgl_selesai ?? '-' }}
                                            </span>
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
