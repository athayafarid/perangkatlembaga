@extends('layouts.app')

@section('title', 'Tambah Anggota Lembaga')

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow">
        <div class="card-header text-white" style="background:#dc3545;">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-person-plus-fill"></i> Tambah Anggota</h4>
                <a href="{{ route('anggota.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('anggota.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jabatan</label>
                        <select name="jabatan_id" class="form-select" required>
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach($jabatan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Lembaga</label>
                        <select name="lembaga_id" class="form-select" required>
                            <option value="">-- Pilih Lembaga --</option>
                            @foreach($lembaga as $l)
                                <option value="{{ $l->id }}">{{ $l->nama_lembaga }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-lab
