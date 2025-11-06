@extends('layouts.admin.app')


@section('content')

<div class="container mt-5">
    <div class="card card-form">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Data Keluarga</h4>
            <a href="{{ route('keluarga.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('keluarga.update', $data->keluarga_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">No KK</label>
                        <input type="text" name="no_kk" class="form-control" value="{{ $data->no_kk }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kepala Keluarga</label>
                        <select name="kepala_keluarga_id" class="form-select" required>
                            <option value="">-- Pilih Warga --</option>
                            @foreach($warga as $w)
                                <option value="{{ $w->warga_id }}" {{ $data->kepala_keluarga_id == $w->warga_id ? 'selected' : '' }}>
                                    {{ $w->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" name="jumlah_anggota" class="form-control" value="{{ $data->jumlah_anggota }}">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">RT</label>
                        <input type="text" name="rt" class="form-control" value="{{ $data->rt }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">RW</label>
                        <input type="text" name="rw" class="form-control" value="{{ $data->rw }}">
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
