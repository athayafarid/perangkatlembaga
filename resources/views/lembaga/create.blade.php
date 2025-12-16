@extends('layouts.admin.app')
@section('title', isset($lembaga) ? 'Edit Lembaga' : 'Tambah Lembaga')

@section('content')

<style>
    .card-form {
        border: none;
        border-radius: 18px;
        box-shadow: 0 6px 18px rgba(13, 60, 97, 0.15);
        overflow: hidden;
    }

    .card-header-blue {
        background: linear-gradient(90deg, #0d6efd 0%, #4dabf7 100%);
        padding: 20px 24px;
        color: #fff;
        border: none;
    }

    .form-control:focus,
    textarea:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .25);
        border-color: #0d6efd;
    }

    .btn-primary-soft {
        background: #0d6efd;
        border: none;
        border-radius: 10px;
        padding: 8px 18px;
    }

    .btn-primary-soft:hover {
        background: #0b5ed7;
    }
</style>

<div class="pc-container">
    <div class="pc-content">

        <div class="container mt-4">
            <div class="card card-form">

                {{-- HEADER --}}
                <div class="card-header-blue d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="bi bi-building"></i>
                        {{ isset($lembaga) ? 'Edit Lembaga Desa' : 'Tambah Lembaga Desa' }}
                    </h4>

                    <a href="{{ route('lembaga_desa.index') }}"
                       class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                {{-- BODY --}}
                <div class="card-body p-4">
                    <form
                        action="{{ isset($lembaga)
                            ? route('lembaga_desa.update', $lembaga)
                            : route('lembaga_desa.store') }}"
                        method="POST">

                        @csrf
                        @isset($lembaga)
                            @method('PUT')
                        @endisset

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lembaga</label>
                            <input type="text"
                                   name="nama_lembaga"
                                   value="{{ old('nama_lembaga', $lembaga->nama_lembaga ?? '') }}"
                                   class="form-control"
                                   placeholder="Masukkan nama lembaga"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan"
                                      rows="3"
                                      class="form-control"
                                      placeholder="Keterangan tambahan (opsional)">{{ old('keterangan', $lembaga->keterangan ?? '') }}</textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit"
                                    class="btn btn-primary-soft text-white">
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
