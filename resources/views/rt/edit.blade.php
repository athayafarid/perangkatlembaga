@extends('layouts.admin.app')
@section('title', 'Edit RT')

@section('content')

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

<div class="pc-container">
<div class="pc-content">

    <!-- Breadcrumb -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit Data RT</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Fitur Utama</a></li>
                        <li class="breadcrumb-item">Data RT</li>
                        <li class="breadcrumb-item" aria-current="page">Edit</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4" style="max-width: 900px;">
        <div class="card card-form">

            <div class="card-header-blue d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Edit RT
                </h4>
                <a href="{{ route('rt.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('rt.update', $rt->rt_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        {{-- Nomor RT --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nomor RT</label>
                            <input type="text" name="nomor_rt"
                                   value="{{ $rt->nomor_rt }}"
                                   class="form-control" required>
                        </div>

                        {{-- RW (Dropdown) --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">RW</label>
                            <select name="rw_id" class="form-select" required>
                                <option value="">-- Pilih RW --</option>
                                @foreach($rw as $r)
                                    <option value="{{ $r->rw_id }}"
                                        {{ $r->rw_id == $rt->rw_id ? 'selected' : '' }}>
                                        RW {{ $r->nomor_rw }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Ketua RT --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ketua RT</label>
                            <select name="ketua_rt_warga_id" class="form-select">
                                <option value="">-- Pilih Warga --</option>
                                @foreach($warga as $w)
                                    <option value="{{ $w->warga_id }}"
                                        {{ $w->warga_id == $rt->ketua_rt_warga_id ? 'selected' : '' }}>
                                        {{ $w->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Keterangan --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <input type="text" name="keterangan"
                                   value="{{ $rt->keterangan }}"
                                   class="form-control">
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
