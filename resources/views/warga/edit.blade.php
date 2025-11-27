@extends('layouts.admin.app')

@section('content')
{{--  start main content  --}}
<div class="pc-container">
    <div class="pc-content">

        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit Data Warga</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Fitur Utama</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Warga</li>
                            <li class="breadcrumb-item" aria-current="page">Edit Data</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- STYLE SAMA DENGAN CREATE -->
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
            .btn-primary {
                border-radius: 10px;
                padding: 8px 18px;
            }
            .form-control:focus, .form-select:focus {
                border-color: #0d6efd;
                box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
            }
        </style>


        <div class="container mt-5">
            <div class="card card-form">
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Warga</h4>
                    <a href="{{ route('warga.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">No KTP</label>
                                <input type="text" name="no_ktp" class="form-control"
                                       value="{{ $warga->no_ktp }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="nama" class="form-control"
                                       value="{{ $warga->nama }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Agama</label>
                                <input type="text" name="agama" class="form-control"
                                       value="{{ $warga->agama }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control"
                                       value="{{ $warga->pekerjaan }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Telepon</label>
                                <input type="text" name="telp" class="form-control"
                                       value="{{ $warga->telp }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ $warga->email }}">
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Perbarui
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- SweetAlert2 untuk pesan sukses -->
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 1800
            });
        </script>
        @endif

    </div>
</div>

@endsection
