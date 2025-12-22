@extends('layouts.admin.app')
@section('title', 'Data RT')

@section('content')
    <div class="pc-container rt-page rw-page">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <h5>Data RT</h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                        <li class="breadcrumb-item">Data RT</li>
                    </ul>
                </div>
            </div>

            <div class="container mt-4">
                <div class="card card-custom">
                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <div class="header-text">
                            <h4>Data RT</h4>
                            <small>Kelola data RT dengan mudah dan cepat</small>
                        </div>

                        <a href="{{ route('rt.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus"></i> Tambah RT
                        </a>
                    </div>


                    <div class="card-body">

                        {{-- SEARCH --}}
                        <form method="GET" action="{{ route('rt.index') }}" class="mb-3">
                            <div class="input-group" style="max-width:300px;">
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                    placeholder="Cari nomor RT...">
                                <button class="btn btn-primary"><i class="bi bi-search"></i></button>

                                @if (request('q'))
                                    <a href="{{ route('rt.index') }}" class="btn btn-outline-secondary">Clear</a>
                                @endif
                            </div>
                        </form>

                        <div class="row g-4 rw-card-grid">
                            @forelse($data as $rt)
                                <div class="col-md-6 col-xl-4">
                                    <div class="rw-card h-100">

                                        <!-- HEADER -->
                                        <div class="rw-card-header">
                                            <div class="rw-title">
                                                RT {{ $rt->nomor_rt }}
                                            </div>

                                            <div class="rw-actions">
                                                <a href="{{ route('rt.edit', $rt->rt_id) }}"
                                                    class="btn btn-icon btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('rt.destroy', $rt->rt_id) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirm('Hapus data ini?')">
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
                                                <span class="label">Nomor RW</span>
                                                <span class="value">{{ $rt->rw->nomor_rw ?? '-' }}</span>
                                            </div>

                                            <div class="rw-row">
                                                <span class="label">Ketua RT</span>
                                                <span class="value">{{ $rt->ketuaRt->nama ?? '-' }}</span>
                                            </div>

                                            <div class="rw-desc">
                                                {{ $rt->keterangan ?? 'Tidak ada keterangan' }}
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
