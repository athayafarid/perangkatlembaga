@extends('layouts.app')
@section('title', isset($jabatan) ? 'Edit Jabatan' : 'Tambah Jabatan')
@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow">
        <div class="card-header text-white" style="background:#ffc107;">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-briefcase"></i> {{ isset($jabatan) ? 'Edit Jabatan' : 'Tambah Jabatan' }}</h4>
                <a href="{{ route('jabatan.index') }}" class="btn btn-light btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ isset($jabatan) ? route('jabatan.update', $jabatan->id) : route('jabatan.store') }}" method="POST">
                @csrf
                @if(isset($jabatan)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $jabatan->nama_jabatan ?? '') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lembaga</label>
                    <select name="lembaga_id" class="form-select" required>
                        <option value="">-- Pilih Lembaga --</option>
                        @foreach($lembaga as $l)
                            <option value="{{ $l->id }}" {{ (old('lembaga_id', $jabatan->lembaga_id ?? '') == $l->id) ? 'selected' : '' }}>
                                {{ $l->nama_lembaga }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $jabatan->deskripsi ?? '') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn text-white" style="background:#ffc107;">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
