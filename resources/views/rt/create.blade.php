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
                            <h5 class="m-b-10">Tambah Data RT</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Fitur Utama </a></li>
                            <li class="breadcrumb-item" aria-current="page">Data RT</li>
                            <li class="breadcrumb-item" aria-current="page">Tambah Data</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

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
            .form-control:focus,
            .form-select:focus {
                border-color: #0d6efd;
                box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
            }
        </style>

        <div class="container mt-5">
            <div class="card card-form">
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah RT</h4>
                    <a href="{{ route('rt.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('rt.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">

                            <!-- NOMOR RT -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nomor RT</label>
                                <input type="text" name="nomor_rt" class="form-control" required>
                            </div>

                            <!-- NOMOR RW DROPDOWN -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nomor RW</label>
                                <select name="rw_id" class="form-select">
                                    <option value="">-- Pilih RW --</option>
                                    @foreach($rw as $item)
                                        <option value="{{ $item->rw_id }}">
                                            RW {{ $item->nomor_rw }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- KETUA RT DROPDOWN -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Ketua RT</label>
                                <select name="ketua_rt_warga_id" class="form-select">
                                    <option value="">-- Pilih Ketua RT --</option>
                                    @foreach($warga as $item)
                                        <option value="{{ $item->warga_id }}">
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- KETERANGAN -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control">
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

    </div>
</div>
{{--  end main content --}}
@endsection
