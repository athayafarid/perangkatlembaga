@extends('layouts.admin.app')

@section('title', 'Data RW')

@section('content')

    <div class="pc-container rw-page">
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
                /* ===============================
           RW PAGE – PREMIUM STYLE
        ================================ */

                .rw-page .card {
                    border-radius: 18px;
                    border: none;
                    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
                }

                /* HEADER */
                .rw-page .card-header-blue {
                    background: linear-gradient(135deg, #1e293b, #334155) !important;
                    color: #fff;
                    border-radius: 18px 18px 0 0;
                }

                /* SEARCH */
                .rw-page .form-control {
                    border-radius: 12px;
                    border: 1px solid #e2e8f0;
                }

                /* TABLE */
                .rw-page table {
                    border-collapse: separate;
                    border-spacing: 0 10px;
                }

                .rw-page table thead th {
                    background: transparent !important;
                    color: #475569;
                    font-weight: 600;
                    border: none;
                }

                .rw-page table tbody tr {
                    background: #ffffff;
                    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
                    transition: all 0.2s ease;
                }

                .rw-page table tbody tr:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
                }

                .rw-page table tbody td {
                    border: none;
                    padding: 14px 16px;
                }

                /* AKSI */
                .rw-page .btn-warning {
                    background: #fbbf24;
                    border: none;
                }

                .rw-page .btn-danger {
                    background: #ef4444;
                    border: none;
                }

                /* PAGINATION */
                .rw-page .page-link {
                    border-radius: 10px;
                    border: none;
                }

                .rw-page .page-item.active .page-link {
                    background: #1e293b;
                }
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
                                    class="form-control form-control-sm" placeholder="Cari nomor RW...">

                                <button class="btn btn-primary btn-sm" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>

                                {{-- Button Clear --}}
                                @if (request('q'))
                                    <a href="{{ route('rw.index') }}" class="btn btn-outline-secondary btn-sm">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </form>

                        <div class="row g-4 rw-card-grid">
                            @forelse($data as $rw)
                                <div class="col-md-6 col-xl-4">
                                    <div class="rw-card h-100">

                                        <!-- HEADER -->
                                        <div class="rw-card-header">
                                            <div class="rw-title">
                                                RW {{ $rw->nomor_rw }}
                                            </div>

                                            <div class="rw-actions">
                                                <a href="{{ route('rw.edit', $rw->rw_id) }}"
                                                    class="btn btn-icon btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('rw.destroy', $rw->rw_id) }}" method="POST"
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
                                                <span class="label">Ketua RW</span>
                                                <span class="value">{{ $rw->ketuaRw->nama ?? '-' }}</span>
                                            </div>

                                            <div class="rw-desc">
                                                {{ $rw->keterangan ?? 'Tidak ada keterangan' }}
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
