@extends('layouts.admin.app')
@section('title', 'Edit Anggota Lembaga')

@section('content')
    <div class="pc-container anggota-page rw-page">
        <div class="pc-content">

            <div class="container mt-4" style="max-width:900px">
                <div class="card card-form">

                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <h4>Edit Anggota Lembaga</h4>
                        <a href="{{ route('anggota_lembaga.index') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <form method="POST" action="{{ route('lembaga_desa.update', $lembaga) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <select name="jabatan_id" class="form-select" required>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ $j->jabatan_id }}"
                                            {{ $anggota->jabatan_id == $j->jabatan_id ? 'selected' : '' }}>
                                            {{ $j->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Lembaga</label>
                                <select name="lembaga_id" class="form-select" required>
                                    @foreach ($lembaga as $l)
                                        <option value="{{ $l->lembaga_id }}"
                                            {{ $anggota->lembaga_id == $l->lembaga_id ? 'selected' : '' }}>
                                            {{ $l->nama_lembaga }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Warga (Opsional)</label>
                                <select name="warga_id" class="form-select">
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach ($warga as $w)
                                        <option value="{{ $w->warga_id }}"
                                            {{ $anggota->warga_id == $w->warga_id ? 'selected' : '' }}>
                                            {{ $w->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" class="form-control"
                                    value="{{ $anggota->tgl_mulai }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tanggal Selesai</label>
                                <input type="date" name="tgl_selesai" class="form-control"
                                    value="{{ $anggota->tgl_selesai }}">
                            </div>

                        </div>

                        <div class="mt-4 d-flex justify-content-end gap-2">
                            <a href="{{ route('anggota_lembaga.index') }}" class="btn btn-light">
                                Batal
                            </a>

                            <button class="btn btn-primary px-4">
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
