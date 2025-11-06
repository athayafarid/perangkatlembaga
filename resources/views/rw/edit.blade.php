@extends('layouts.app')

@section('title', 'Edit RW')

@section('content')
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
