@extends('layouts.admin.app')

@section('title', 'Data RW')

@section('content')
<div class="pc-container">
    <div class="pc-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5>Data RW</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                            <li class="breadcrumb-item">Data RW</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .card-custom { border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.1); }
            .card-header-blue { background: linear-gradient(90deg, #0d6efd, #2b8cff); color: #fff; padding: 20px; }
            .table-custom thead th { background: rgba(13,110,253,0.08); color: #084298; font-weight: 600; }
            .pagination .page-link { color: #0d6efd; }
            .pagination .active .page-link { background:#0d6efd; border-color:#0d6efd; }
        </style>

        <div class="container mt-4">
            <div class="card card-custom">
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data RW</h4>
                        <small>Kelola data RW dengan mudah dan cepat</small>
                    </div>
                    <a href="{{ route('rw.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus"></i> Tambah RW
                    </a>
                </div>

                <div class="card-body">

                    {{-- SEARCH --}}
                    <form method="GET" action="{{ route('rw.index') }}" class="mb-3">
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" name="q" value="{{ request('q') }}"
                                class="form-control form-control-sm"
                                placeholder="Cari nomor RW...">

                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="bi bi-search"></i>
                            </button>

                            {{-- Button Clear --}}
                            @if(request('q'))
                            <a href="{{ route('rw.index') }}" class="btn btn-outline-secondary btn-sm">
                                Clear
                            </a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-custom table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor RW</th>
                                    <th>Ketua RW</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($data as $rw)
                                    <tr>
                                        <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                                        <td>{{ $rw->nomor_rw }}</td>
                                        <td>{{ $rw->ketuaRw->nama ?? '-' }}</td>
                                        <td>{{ $rw->keterangan ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('rw.edit', $rw->rw_id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('rw.destroy', $rw->rw_id) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Hapus data ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <div class="mt-3 d-flex justify-content-end">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
