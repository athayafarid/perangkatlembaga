@extends('layouts.admin.app')
@section('title', 'Edit Lembaga Desa')

@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="container mt-4" style="max-width:900px;">
                <div class="card card-form">

                    {{-- HEADER --}}
                    <div class="card-header-green d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-pencil-square"></i> Edit Lembaga Desa
                        </h4>
                        <a href="{{ route('lembaga_desa.index') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-4">
                        <form method="POST"
                            action="{{ route('lembaga_desa.update', ['lembaga_desa' => $lembaga->lembaga_id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nama Lembaga</label>
                                    <input type="text" name="nama_lembaga" class="form-control"
                                        value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Logo</label>
                                    <input type="file" name="logo" class="form-control">

                                    @if ($lembaga->logo)
                                        <small class="text-muted d-block mt-1">
                                            Logo saat ini:
                                        </small>
                                        <img src="{{ asset('storage/' . $lembaga->logo) }}" width="60"
                                            class="rounded mt-1">
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Deskripsi</label>
                                    <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $lembaga->deskripsi) }}</textarea>
                                </div>

                            </div>

                            <div class="mt-4 text-end">
                                <button type="submit" class="btn btn-green-custom text-white">
                                    <i class="bi bi-save"></i> Update
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
