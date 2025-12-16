@extends('layouts.admin.app')
@section('title', 'Data Lembaga Desa')

@section('content')

<style>
    .card-form {
        border: none;
        border-radius: 18px;
        box-shadow: 0 6px 18px rgba(13, 60, 97, 0.15);
        overflow: hidden;
    }

    .card-header-blue {
        background: linear-gradient(90deg, #0d6efd 0%, #4dabf7 100%);
        padding: 20px 24px;
        color: #fff;
        border: none;
    }

    .search-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .25);
        border-color: #0d6efd;
    }

    .table thead {
        background: #e7f1ff;
    }

    .btn-action {
        border-radius: 8px;
        padding: 6px 10px;
    }
</style>

<div class="pc-container">
    <div class="pc-content">

        <div class="container mt-4">

            <div class="card card-form">

                {{-- HEADER --}}
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="bi bi-building"></i> Data Lembaga Desa
                    </h4>
                    <a href="{{ route('lembaga_desa.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-lg"></i> Tambah
                    </a>
                </div>

                <div class="card-body p-4">

                    {{-- SEARCH --}}
                    <form method="GET" action="{{ route('lembaga_desa.index') }}"
                          class="mb-4" style="max-width:380px;">
                        <div class="input-group">
                            <input type="text"
                                   name="q"
                                   value="{{ request('q') }}"
                                   class="form-control search-input"
                                   placeholder="Cari nama lembaga...">

                            <button class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>

                            @if(request('q'))
                                <a href="{{ route('lembaga_desa.index') }}"
                                   class="btn btn-outline-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    {{-- TABLE --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="fw-semibold text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lembaga</th>
                                    <th>Keterangan</th>
                                    <th width="150">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($data as $l)
                                    <tr>
                                        <td>
                                            {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $l->nama_lembaga }}</td>
                                        <td>{{ $l->keterangan ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('lembaga_desa.edit', $l) }}"
                                               class="btn btn-warning btn-sm btn-action">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('lembaga_desa.destroy', $l) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm btn-action">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
                                            class="text-center text-muted py-3">
                                            Tidak ada data ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
