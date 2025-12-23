@extends('layouts.admin.app')
@section('title', 'Tambah Anggota Lembaga')

@section('content')


    <div class="pc-container anggota-page rw-page">
        <div class="pc-content">

            {{-- PAGE HEADER --}}
            <div class="page-header">
                <div class="page-block">
                    <h5>Tambah Anggota Lembaga</h5>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('anggota_lembaga.index') }}">Anggota Lembaga</a>
                        </li>
                        <li class="breadcrumb-item">Tambah</li>
                    </ul>
                </div>
            </div>

            <div class="container mt-4" style="max-width:900px">
                <div class="card card-form">

                    {{-- CARD HEADER --}}
                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Anggota Lembaga</h4>
                        <a href="{{ route('anggota_lembaga.index') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                    {{-- CARD BODY --}}
                    <div class="card-body p-4">
                        <form action="{{ route('anggota_lembaga.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nama Anggota</label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Masukkan nama anggota" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Jabatan</label>
                                    <select name="jabatan_id" class="form-select" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        @foreach ($jabatan as $j)
                                            <option value="{{ $j->jabatan_id }}">
                                                {{ $j->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Lembaga</label>
                                    <select name="lembaga_id" class="form-select" required>
                                        <option value="">-- Pilih Lembaga --</option>
                                        @foreach ($lembaga as $l)
                                            <option value="{{ $l->lembaga_id }}">
                                                {{ $l->nama_lembaga }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Warga (Opsional)</label>
                                    <select name="warga_id" class="form-select">
                                        <option value="">-- Pilih Warga --</option>
                                        @foreach ($warga as $w)
                                            <option value="{{ $w->warga_id }}">
                                                {{ $w->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai" class="form-control">
                                </div>

                            </div>

                            {{-- ACTION --}}
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('anggota_lembaga.index') }}" class="btn btn-light">
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
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
