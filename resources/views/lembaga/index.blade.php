@extends('layouts.admin.app')
@section('title', 'Data Lembaga Desa')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-purple text-white"
             style="background:#6f42c1; display:flex; justify-content:space-between;">
            <h4 class="mb-0">Data Lembaga Desa</h4>
            <a href="{{ route('lembaga_desa.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus"></i> Tambah
            </a>
        </div>

        <div class="card-body">

            {{-- SEARCH --}}
            <form method="GET" action="{{ route('lembaga_desa.index') }}" class="mb-3" style="max-width:350px;">
                <div class="input-group">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                        placeholder="Cari nama lembaga...">

                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>

                    @if(request('q'))
                        <a href="{{ route('lembaga_desa.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </form>

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lembaga</th>
                        <th>Keterangan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                   @foreach($data as $l)

                        <tr>
                            <td>{{ ($lembaga->currentPage()-1)*$lembaga->perPage()+$loop->iteration }}</td>
                            <td>{{ $l->nama_lembaga }}</td>
                            <td>{{ $l->keterangan }}</td>

                            <td>
                                <a href="{{ route('lembaga_desa.edit', $l->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('lembaga_desa.destroy', $l->id) }}" method="POST"
                                      class="d-inline" onsubmit="return confirm('Hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>
                    @endforelse
                </tbody>

            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $lembaga->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection
