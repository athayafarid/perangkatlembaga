@extends('layouts.admin.app')

@section('title', 'Edit RW')

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
            <h4><i class="bi bi-pencil-square"></i> Edit RW</h4>
            <a href="{{ route('rw.index') }}" class="btn btn-light btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('rw.update', $rw->rw_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor RW</label>
                        <input type="text" name="nomor_rw" value="{{ $rw->nomor_rw }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Ketua RW (Dropdown)</label>
                        <select name="ketua_rw_warga_id" class="form-select">
                            <option value="">-- Pilih Warga --</option>
                            @foreach($warga as $item)
                                <option value="{{ $item->warga_id }}" {{ $rw->ketua_rw_warga_id == $item->warga_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Atau Input Manual ID Ketua</label>
                        <input type="number" name="ketua_rw_warga_id" class="form-control" value="{{ $rw->ketua_rw_warga_id }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ $rw->keterangan }}" class="form-control">
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
