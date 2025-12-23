@extends('layouts.admin.app')
@section('title', 'Edit Perangkat Desa')

@section('content')
<div class="pc-container perangkat-page rw-page">
    <div class="pc-content">

        {{-- PAGE HEADER --}}
        <div class="page-header">
            <div class="page-block">
                <h5>Edit Perangkat Desa</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item">Edit</li>
                </ul>
            </div>
        </div>

        <div class="container mt-4" style="max-width: 900px;">
            <div class="card card-custom">

                {{-- HEADER (SAMA SEPERTI RT) --}}
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <div class="header-text">
                        <h4>Edit Perangkat Desa</h4>
                        <small>Perbarui data perangkat desa</small>
                    </div>

                    <a href="{{ route('perangkat_desa.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                {{-- BODY --}}
                <div class="card-body p-4">

                    <form action="{{ route('perangkat_desa.update', $data->perangkat_id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <input type="text"
                                       name="jabatan"
                                       class="form-control"
                                       value="{{ $data->jabatan }}"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Warga</label>
                                <select name="warga_id" class="form-select">
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach($warga as $w)
                                        <option value="{{ $w->warga_id }}"
                                            {{ $data->warga_id == $w->warga_id ? 'selected' : '' }}>
                                            {{ $w->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode Mulai</label>
                                <input type="date"
                                       name="periode_mulai"
                                       class="form-control"
                                       value="{{ $data->periode_mulai }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode Selesai</label>
                                <input type="date"
                                       name="periode_selesai"
                                       class="form-control"
                                       value="{{ $data->periode_selesai }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Foto</label>
                                <input type="file" name="foto" class="form-control">
                                @if($data->foto)
                                    <small class="text-muted d-block mt-1">
                                        Foto sudah tersedia
                                    </small>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Keterangan</label>
                                <textarea name="keterangan"
                                          rows="3"
                                          class="form-control">{{ $data->keterangan }}</textarea>
                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
