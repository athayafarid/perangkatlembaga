@extends('layouts.admin.app')
@section('title', 'Data Lembaga Desa')

@section('content')



    <div class="pc-container lembaga-page rw-page">
        <div class="pc-content">

            <div class="container mt-4">

                <div class="card card-custom">
                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <div class="header-text">
                            <h4>Data Lembaga Desa</h4>
                            <small>Kelola data lembaga desa</small>
                        </div>

                        <a href="{{ route('lembaga_desa.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus"></i> Tambah
                        </a>
                    </div>


                    <div class="card-body p-4">

                        {{-- SEARCH --}}
                        <form method="GET" action="{{ route('lembaga_desa.index') }}" class="mb-4"
                            style="max-width:420px;">
                            <div class="input-group">
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



                        {{-- TABLE --}}
                        <div class="row g-4 rw-card-grid">
                            @forelse($data as $l)
                                <div class="col-md-6 col-xl-4">
                                    <div class="rw-card h-100">

                                        <!-- HEADER -->
                                        <div class="rw-card-header">
                                            <div class="rw-title">
                                                {{ $l->nama_lembaga }}
                                            </div>

                                            <div class="rw-actions">
                                                <a href="{{ route('lembaga_desa.edit', $l) }}"
                                                    class="btn btn-icon btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <form action="{{ route('lembaga_desa.destroy', $l) }}" method="POST"
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
                                            <div class="rw-desc">
                                                {{ $l->keterangan ?? 'Tidak ada keterangan' }}
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
