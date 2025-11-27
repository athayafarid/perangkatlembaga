@extends('layouts.admin.app')

@section('content')
<div class="container mt-4" style="max-width: 650px;">
    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-2 px-3" style="background:#ffc107;">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="font-size: 16px;">
                    <i class="bi bi-briefcase"></i>
                    {{ isset($jabatan) ? 'Edit Jabatan' : 'Tambah Jabatan' }}
                </h5>

                <a href="{{ route('jabatan_lembaga.index') }}"
                   class="btn btn-light btn-sm py-1 px-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card-body p-3">

            <form
                action="{{ isset($jabatan)
                        ? route('jabatan_lembaga.update', $jabatan->jabatan_id)
                        : route('jabatan_lembaga.store') }}"
                method="POST">

                @csrf
                @if(isset($jabatan)) @method('PUT') @endif

                <div class="mb-2">
                    <label class="form-label small">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan"
                           class="form-control form-control-sm"
                           value="{{ old('nama_jabatan', $jabatan->nama_jabatan ?? '') }}"
                           required>
                </div>

                <div class="mb-2">
                    <label class="form-label small">Lembaga</label>
                    <select name="lembaga_id" class="form-select form-select-sm" required>
                        <option value="">-- Pilih Lembaga --</option>
                        @foreach($lembaga as $l)
                            <option value="{{ $l->lembaga_id }}"
                                {{ old('lembaga_id', $jabatan->lembaga_id ?? '') == $l->lembaga_id ? 'selected' : '' }}>
                                {{ $l->nama_lembaga }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label small">Level</label>
                    <input type="text" name="level"
                        class="form-control form-control-sm"
                        value="{{ old('level', $jabatan->level ?? '') }}">
                </div>

                <div class="text-end mt-2">
                    <button type="submit" class="btn text-white btn-sm px-3 py-1" style="background:#ffc107;">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
