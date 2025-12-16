@extends('layouts.admin.app')
@section('title', 'Tambah Perangkat Desa')

@section('content')

<style>
    .card-form {
        border: none;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(13, 60, 97, 0.15);
        overflow: hidden;
    }
    .card-header-green {
        background: linear-gradient(90deg, #198754 0%, #28b76b 100%);
        color: #fff;
        padding: 20px 24px;
        border: none;
    }
    .btn-green-custom {
        background: #198754;
        border-radius: 10px;
        padding: 8px 18px;
        border: none;
    }
    .form-control:focus, .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.2rem rgba(25,135,84,.25);
    }
</style>

<div class="pc-container">
<div class="pc-content">

    <div class="container mt-4" style="max-width: 900px;">
        <div class="card card-form">

            {{-- HEADER --}}
            <div class="card-header-green d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Perangkat Desa</h4>
                <a href="{{ route('perangkat_desa.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('perangkat_desa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        {{-- Jabatan --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" required>
                        </div>

                        {{-- Nama Warga --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Warga</label>
                            <select name="warga_id" class="form-select">
                                <option value="">-- Pilih Warga --</option>
                                @foreach($warga as $w)
                                    <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Periode Mulai --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Periode Mulai</label>
                            <input type="text" name="periode_mulai" class="form-control">
                        </div>

                        {{-- Periode Selesai --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Periode Selesai</label>
                            <input type="text" name="periode_selesai" class="form-control">
                        </div>

                        {{-- Foto --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        {{-- Keterangan --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan" rows="2" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-green-custom text-white">
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
