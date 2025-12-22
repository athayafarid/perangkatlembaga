@extends('layouts.admin.app')

@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <h5>Tambah Jabatan Lembaga</h5>
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">

                        <div class="form-card">

                            <!-- HEADER -->
                            <div class="form-card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h4>Tambah Jabatan</h4>
                                    <small>Isi data jabatan lembaga</small>
                                </div>
                                <a href="{{ route('jabatan_lembaga.index') }}" class="btn btn-light btn-sm">
                                    Kembali
                                </a>
                            </div>

                            <!-- BODY -->
                            <div class="form-card-body">
                                <form action="{{ route('jabatan_lembaga.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Nama Jabatan</label>
                                        <input type="text" name="nama_jabatan" class="form-control"
                                            placeholder="Contoh: Sekretaris" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Lembaga</label>
                                        <select name="lembaga_id" class="form-select" required>
                                            <option value="">-- Pilih Lembaga --</option>
                                            @foreach ($lembaga as $l)
                                                <option value="{{ $l->lembaga_id }}">
                                                    {{ $l->nama_lembaga }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <input type="text" name="level" class="form-control"
                                            placeholder="Contoh: 1 / Ketua / Pengurus">
                                    </div>

                                    <!-- FOOTER -->
                                    <div class="form-card-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-save"></i> Simpan
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endsection
