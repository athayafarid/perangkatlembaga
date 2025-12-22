@extends('layouts.admin.app')

@section('content')
<div class="pc-container">
    <div class="pc-content">

        <div class="page-header">
            <h5>Edit Jabatan Lembaga</h5>
        </div>

        <div class="container mt-4" style="max-width:700px;">
            <div class="card card-custom">

                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <h4>Edit Jabatan</h4>
                    <a href="{{ route('jabatan_lembaga.index') }}" class="btn btn-light btn-sm">
                        Kembali
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('jabatan_lembaga.update', $jabatan->jabatan_id) }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Jabatan</label>
                            <input type="text"
                                   name="nama_jabatan"
                                   class="form-control"
                                   value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lembaga</label>
                            <select name="lembaga_id" class="form-select" required>
                                <option value="">-- Pilih Lembaga --</option>
                                @foreach($lembaga as $l)
                                    <option value="{{ $l->lembaga_id }}"
                                        {{ old('lembaga_id', $jabatan->lembaga_id) == $l->lembaga_id ? 'selected' : '' }}>
                                        {{ $l->nama_lembaga }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <input type="text"
                                   name="level"
                                   class="form-control"
                                   value="{{ old('level', $jabatan->level) }}">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
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
