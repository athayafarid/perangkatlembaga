@extends('layouts.admin.app')
@section('title', 'Tambah Perangkat Desa')

@section('content')
<div class="pc-container perangkat-page rw-page">
    <div class="pc-content">

        {{-- PAGE HEADER --}}
        <div class="page-header">
            <div class="page-block">
                <h5>Tambah Perangkat Desa</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item">Tambah</li>
                </ul>
            </div>
        </div>

        <div class="container mt-4" style="max-width: 900px;">
            <div class="card card-custom">

                {{-- HEADER --}}
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <div class="header-text">
                        <h4>Tambah Perangkat Desa</h4>
                        <small>Input data perangkat desa baru</small>
                    </div>

                    <a href="{{ route('perangkat_desa.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                {{-- BODY --}}
                <div class="card-body p-4">

                    <form action="{{ route('perangkat_desa.store') }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">

                            {{-- JABATAN --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <input type="text"
                                       name="jabatan"
                                       class="form-control"
                                       placeholder="Contoh: Kepala Desa"
                                       required>
                            </div>

                            {{-- WARGA --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Warga</label>
                                <select name="warga_id" class="form-select">
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach($warga as $w)
                                        <option value="{{ $w->warga_id }}">
                                            {{ $w->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- PERIODE MULAI --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode Mulai</label>
                                <input type="date"
                                       name="periode_mulai"
                                       class="form-control">
                            </div>

                            {{-- PERIODE SELESAI --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode Selesai</label>
                                <input type="date"
                                       name="periode_selesai"
                                       class="form-control">
                            </div>

                            {{-- FOTO --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Foto</label>
                                <input type="file"
                                       name="foto"
                                       class="form-control">
                                <small class="text-muted">
                                    Format JPG / PNG, maksimal 2MB
                                </small>
                            </div>

                            {{-- KETERANGAN --}}
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Keterangan</label>
                                <textarea name="keterangan"
                                          rows="3"
                                          class="form-control"
                                          placeholder="Keterangan tambahan (opsional)"></textarea>
                            </div>

                        </div>

                        {{-- ACTION --}}
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
