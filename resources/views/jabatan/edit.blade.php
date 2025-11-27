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
                            <h5 class="m-b-10">
                                {{ isset($jabatan) ? 'Edit Jabatan Lembaga' : 'Tambah Jabatan Lembaga' }}
                            </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Fitur Utama</a></li>
                            <li class="breadcrumb-item">Jabatan Lembaga</li>
                            <li class="breadcrumb-item" aria-current="page">
                                {{ isset($jabatan) ? 'Edit' : 'Tambah' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- STYLE DISAMAKAN DENGAN FORM WARGA -->
        <style>
            .card-form {
                border: none;
                border-radius: 16px;
                box-shadow: 0 6px 18px rgba(13, 60, 97, 0.1);
                overflow: hidden;
            }
            .card-header-yellow {
                background: linear-gradient(90deg, #0d6efd 0%, #ffda47 100%);
                color: #fff;
                padding: 20px 24px;
                border: none;
            }
            .btn-warning-custom {
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

        <div class="container mt-4" style="max-width: 700px;">
            <div class="card card-form">

                <div class="card-header-yellow d-flex justify-content-between align-items-center">
                    <h4 class="mb-0" style="font-size:17px;">
                        <i class="bi bi-briefcase"></i>
                        {{ isset($jabatan) ? 'Edit Jabatan' : 'Tambah Jabatan' }}
                    </h4>
                    <a href="{{ route('jabatan_lembaga.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4">
                    <form
                        action="{{ isset($jabatan)
                                ? route('jabatan_lembaga.update', $jabatan->jabatan_id)
                                : route('jabatan_lembaga.store') }}"
                        method="POST">

                        @csrf
                        @if(isset($jabatan)) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Jabatan</label>
                            <input type="text" name="nama_jabatan"
                                   class="form-control"
                                   value="{{ old('nama_jabatan', $jabatan->nama_jabatan ?? '') }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Lembaga</label>
                            <select name="lembaga_id" class="form-select" required>
                                <option value="">-- Pilih Lembaga --</option>
                                @foreach($lembaga as $l)
                                    <option value="{{ $l->lembaga_id }}"
                                        {{ old('lembaga_id', $jabatan->lembaga_id ?? '') == $l->lembaga_id ? 'selected' : '' }}>
                                        {{ $l->nama_lembaga }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Level</label>
                            <input type="text" name="level"
                                   class="form-control"
                                   value="{{ old('level', $jabatan->level ?? '') }}">
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-warning-custom text-white">
                                <i class="bi bi-save"></i>
                                {{ isset($jabatan) ? 'Perbarui' : 'Simpan' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- SweetAlert -->
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        @endif

    </div>
</div>
@endsection
