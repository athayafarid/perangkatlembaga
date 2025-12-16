@extends('layouts.admin.app')
@section('title', isset($lembaga) ? 'Edit Lembaga' : 'Tambah Lembaga')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow">
        <div class="card-header text-white" style="background:#6f42c1;">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="bi bi-building"></i>
                    {{ isset($lembaga) ? 'Edit Lembaga' : 'Tambah Lembaga' }}
                </h4>

                {{-- ⬇️ FIX --}}
                <a href="{{ route('lembaga_desa.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card-body">
            <form
                action="{{ isset($lembaga)
                    ? route('lembaga_desa.update', $lembaga->id)
                    : route('lembaga_desa.store') }}"
                method="POST">

                @csrf
                @isset($lembaga)
                    @method('PUT')
                @endisset

                <div class="mb-3">
                    <label class="form-label">Nama Lembaga</label>
                    <input type="text"
                           name="nama_lembaga"
                           value="{{ old('nama_lembaga', $lembaga->nama_lembaga ?? '') }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control">{{ old('keterangan', $lembaga->keterangan ?? '') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn text-white" style="background:#6f42c1;">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
