@extends('layouts.admin.app')
@section('title','Data Perangkat Desa')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between">
            <h4>Data Perangkat Desa</h4>
            <a href="{{ route('perangkat_desa.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus"></i> Tambah
            </a>
        </div>

        <div class="card-body">

            {{-- SEARCH --}}
            <form method="GET" action="{{ route('perangkat_desa.index') }}" class="mb-3" style="max-width:350px;">
                <div class="input-group">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                        placeholder="Cari nama perangkat...">
                    <button class="btn btn-success"><i class="bi bi-search"></i></button>

                    @if(request('q'))
                        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </form>

            <table class="table table-hover align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Periode</th>
                        <th>Keterangan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($data as $p)
                    <tr>
                        <td>{{ ($data->currentPage()-1)*$data->perPage()+$loop->iteration }}</td>
                        <td>
                            @if($p->foto)
                                <img src="{{ asset('storage/' . $p->foto) }}" width="50" class="rounded">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $p->warga->nama ?? '-' }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>{{ $p->periode_mulai }} - {{ $p->periode_selesai }}</td>
                        <td>{{ $p->keterangan ?? '-' }}</td>

                        <td>
                            <a href="{{ route('perangkat_desa.edit', $p->perangkat_id) }}"
                                class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>

                            <form action="{{ route('perangkat_desa.destroy', $p->perangkat_id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus data?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
                    @endforelse

                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection
