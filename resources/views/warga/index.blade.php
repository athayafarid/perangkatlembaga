@extends('layouts.admin.app')
@section('title', 'Data Warga')

@section('content')
<div class="pc-container">
    <div class="pc-content">

        <div class="page-header">
            <h5>Data Warga</h5>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                <li class="breadcrumb-item">Data Warga</li>
            </ul>
        </div>

        <div class="container mt-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    <h4>Data Warga</h4>
                    <a href="{{ route('warga.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus"></i> Tambah Warga
                    </a>
                </div>

                <div class="card-body">

                    {{-- SEARCH --}}
                    <form method="GET" action="{{ route('warga.index') }}" class="mb-3 d-flex" style="max-width:350px;">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                            placeholder="Cari nama, KTP, pekerjaan...">

                        <button class="btn btn-primary ms-2"><i class="bi bi-search"></i></button>

                        @if(request('q'))
                        <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary ms-2">Clear</a>
                        @endif
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>No KTP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Pekerjaan</th>
                                    <th width="150" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ ($data->currentPage()-1)*$data->perPage()+$loop->iteration }}</td>
                                        <td>{{ $item->no_ktp }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->agama }}</td>
                                        <td>{{ $item->pekerjaan }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('warga.edit', $item->warga_id) }}"
                                               class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>

                                            <form action="{{ route('warga.destroy', $item->warga_id) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Hapus data?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="7" class="text-center text-muted">Belum ada data</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
