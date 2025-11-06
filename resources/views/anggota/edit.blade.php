@extends('layouts.app')

@section('title', 'Edit Anggota Lembaga')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow">
        <div class="card-header text-white" style="background:#dc3545;">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Anggota</h4>
                <a href="{{ route('anggota.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jabatan</label>
                        <select name="jabatan_id" class="form-select" required>
                            @foreach($jabatan as $j)
                                <option value="{{ $j->id }}" {{ $anggota->jabatan_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Lembaga</label>
                        <select name="lembaga_id" class="form-select" required>
                            @foreach($lembaga as $l)
                                <option value="{{ $l->id }}" {{ $anggota->lembaga_id == $l->id ? 'selected' : '' }}>
                                    {{ $l->nama_lembaga }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No. Telepon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp', $anggota->no_telp) }}" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" value="{{ old('email', $anggota->email) }}" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $anggota->alamat) }}</textarea>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn text-white" style="background:#dc3545;">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
