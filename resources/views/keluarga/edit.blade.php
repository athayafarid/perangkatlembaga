@extends('layouts.admin.app')

@section('content')

<div class="pc-container">
    <div class="pc-content">

        <!-- Breadcrumb -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit Data Keluarga</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Fitur Utama</a></li>
                            <li class="breadcrumb-item">Data Keluarga</li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- STYLE SAMA DENGAN FORM WARGA -->
        <style>
            .card-form {
                border: none;
                border-radius: 16px;
                box-shadow: 0 6px 18px rgba(13, 60, 97, 0.1);
                overflow: hidden;
            }
            .card-header-blue {
                background: linear-gradient(90deg, #0d6efd 0%, #2b8cff 100%);
                color: #fff;
                padding: 20px 24px;
                border: none;
            }
            .btn-primary-custom {
                background: #0d6efd;
                border-radius: 10px;
                padding: 8px 18px;
                border: none;
            }
            .form-control:focus, .form-select:focus {
                border-color: #0d6efd;
                box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
            }
        </style>

        <div class="container mt-5" style="max-width: 900px;">
            <div class="card card-form">

                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square"></i> Edit Data Keluarga
                    </h4>
                    <a href="{{ route('keluarga.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('keluarga.update', $data->keluarga_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">No KK</label>
                                <input type="text" name="no_kk" class="form-control"
                                       value="{{ $data->no_kk }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kepala Keluarga</label>
                                <select name="kepala_keluarga_id" class="form-select" required>
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach($warga as $w)
                                        <option value="{{ $w->warga_id }}"
                                            {{ $data->kepala_keluarga_id == $w->warga_id ? 'selected' : '' }}>
                                            {{ $w->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Jumlah Anggota</label>
                                <input type="number" name="jumlah_anggota" class="form-control"
                                       value="{{ $data->jumlah_anggota }}">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                       value="{{ $data->alamat }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">RT</label>
                                <input type="text" name="rt" class="form-control"
                                       value="{{ $data->rt }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">RW</label>
                                <input type="text" name="rw" class="form-control"
                                       value="{{ $data->rw }}">
                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary-custom text-white">
                                <i class="bi bi-save"></i> Perbarui
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
