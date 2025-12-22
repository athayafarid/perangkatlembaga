@extends('layouts.admin.app')
@section('title', 'Data Warga')

@section('content')
    <div class="pc-container warga-page rw-page">
        <div class="pc-content">

            <div class="page-header">
                <h5>Data Warga</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                    <li class="breadcrumb-item">Data Warga</li>
                </ul>
            </div>

            <div class="container mt-4">
                <div class="card card-custom">
                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <div class="header-text">
                            <h4>Data Warga</h4>
                            <small>Kelola data warga dengan mudah dan cepat</small>
                        </div>

                        <a href="{{ route('warga.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus"></i> Tambah Warga
                        </a>
                    </div>


                    <div class="card-body">

                        {{-- SEARCH --}}
                        <form method="GET" action="{{ route('warga.index') }}" class="mb-4" style="max-width:420px;">
                            <div class="input-group">
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                    placeholder="Cari nama, NIK, pekerjaan...">
                                <button class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>

                                @if (request('q'))
                                    <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </form>


                        <div class="row g-4 rw-card-grid">
                            @forelse($data as $item)
                                <div class="col-md-6 col-xl-4">
                                    <div class="rw-card h-100">

                                        <!-- HEADER -->
                                        <div class="rw-card-header">
                                            <div class="rw-title">
                                                {{ $item->nama }}
                                            </div>

                                            <div class="rw-actions">
                                                <a href="{{ route('warga.edit', $item->warga_id) }}"
                                                    class="btn btn-icon btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirm('Hapus data?')">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-icon btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        <div class="rw-card-body">
                                            <div class="rw-row">
                                                <span class="label">NIK</span>
                                                <span class="value">{{ $item->no_ktp }}</span>
                                            </div>

                                            <div class="rw-row">
                                                <span class="label">Jenis Kelamin</span>
                                                <span class="value">{{ $item->jenis_kelamin }}</span>
                                            </div>

                                            <div class="rw-row">
                                                <span class="label">Agama</span>
                                                <span class="value">{{ $item->agama }}</span>
                                            </div>

                                            <div class="rw-row">
                                                <span class="label">Pekerjaan</span>
                                                <span class="value">{{ $item->pekerjaan }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center text-muted py-5">
                                    Belum ada data
                                </div>
                            @endforelse
                        </div>


                        <div class="d-flex justify-content-end mt-3">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
