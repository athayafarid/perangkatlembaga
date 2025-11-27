@extends('layouts.admin.app')
@section('title', 'Tambah Perangkat Desa')

@section('content')
<div class="container mt-5">
    <div class="card card-form">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Perangkat Desa</h4>
            <a href="{{ route('perangkat.index') }}" class="btn btn-light btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body">
            <form action="{{ route('perangkat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Warga (Dropdown)</label>
                        <select name="warga_id" class="form-select">
                            <option value="">-- Pilih Warga --</option>
                            @foreach($warga as $w)
                                <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Periode Mulai</label>
                        <input type="text" name="periode_mulai" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Periode Selesai</label>
                        <input type="text" name="periode_selesai" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
