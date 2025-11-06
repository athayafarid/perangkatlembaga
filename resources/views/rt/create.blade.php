@extends('layouts.app')
@section('title', 'Tambah RT')

@section('content')
<div class="container mt-5">
    <div class="card card-form">
        <div class="card-header-blue d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah RT</h4>
            <a href="{{ route('rt.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('rt.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor RT</label>
                        <input type="text" name="nomor_rt" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor RW (Dropdown)</label>

                            <input type="text" name="rw_id" class="form-control" required>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Atau Input RW ID Manual</label>
                        <input type="number" name="rw_id" class="form-control" placeholder="Isi ID RW manual jika tidak pilih dropdown">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Ketua RT (Dropdown)</label>
                        <select name="ketua_rt_warga_id" class="form-select">
                            <option value="">-- Pilih Ketua RT --</option>
                            @foreach($warga as $w)
                            <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Atau Input ID Ketua RT Manual</label>
                        <input type="number" name="ketua_rt_warga_id" class="form-control" placeholder="Isi ID manual jika tidak pilih dropdown">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
