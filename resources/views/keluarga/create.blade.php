@extends('layouts.admin.app')


@section('content')
<div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">{{ isset($keluarga) ? 'Edit Data Keluarga' : 'Tambah Data Keluarga' }}</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Fitur Utama</a></li>
                                <li class="breadcrumb-item">Data Keluarga</li>
                                <li class="breadcrumb-item" aria-current="page">
                                    {{ isset($jabatan) ? 'Edit Data' : 'Tambah Data' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

<div class="container mt-5">
    <div class="card card-form">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Data Keluarga</h4>
            <a href="{{ route('keluarga.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('keluarga.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">No KK</label>
                        <input type="text" name="no_kk" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kepala Keluarga</label>
                        <input type="text" name="kepala_keluarga" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" name="jumlah_anggota" class="form-control" value="0">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">RT</label>
                        <input type="text" name="rt" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">RW</label>
                        <input type="text" name="rw" class="form-control">
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
