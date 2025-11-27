@extends('layouts.admin.app')
@section('title', 'Edit RT')

@section('content')
<div class="container mt-5">
    <div class="card card-form">
        <div class="card-header-blue d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit RT</h4>
            <a href="{{ route('rt.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('rt.update', $rt->rt_id) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor RT</label>
                        <input type="text" name="nomor_rt" value="{{ $rt->nomor_rt }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor RW (Dropdown)</label>
                        <select name="rw_id" class="form-select" required>
                            @foreach($rw as $r)
                            <option value="{{ $r->rw_id }}" {{ $r->rw_id == $rt->rw_id ? 'selected' : '' }}>
                                {{ $r->nomor_rw }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Atau Input RW ID Manual</label>
                        <input type="number" name="rw_id" value="{{ $rt->rw_id }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Ketua RT (Dropdown)</label>
                        <select name="ketua_rt_warga_id" class="form-select">
                            @foreach($warga as $w)
                            <option value="{{ $w->warga_id }}" {{ $w->warga_id == $rt->ketua_rt_warga_id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Atau Input ID Ketua RT Manual</label>
                        <input type="number" name="ketua_rt_warga_id" value="{{ $rt->ketua_rt_warga_id }}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ $rt->keterangan }}" class="form-control">
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
