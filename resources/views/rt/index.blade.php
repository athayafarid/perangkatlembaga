@extends('layouts.admin.app')
@section('title', 'Data RT')

@section('content')
<div class="pc-container">
    <div class="pc-content">

        <div class="page-header">
            <div class="page-block">
                <h5>Data RT</h5>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Fitur Utama</a></li>
                    <li class="breadcrumb-item">Data RT</li>
                </ul>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    <h4 class="mb-0">Data RT</h4>
                    <a href="{{ route('rt.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus"></i> Tambah RT
                    </a>
                </div>

                <div class="card-body">

                    {{-- SEARCH --}}
                    <form method="GET" action="{{ route('rt.index') }}" class="mb-3">
                        <div class="input-group" style="max-width:300px;">
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                placeholder="Cari nomor RT...">
                            <button class="btn btn-primary"><i class="bi bi-search"></i></button>

                            @if(request('q'))
                                <a href="{{ route('rt.index') }}" class="btn btn-outline-secondary">Clear</a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nomor RT</th>
                                    <th>Nomor RW</th>
                                    <th>Ketua RT</th>
                                    <th>Keterangan</th>
                                    <th width="150" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($data as $rt)
                                    <tr>
                                        <td>{{ ($data->currentPage()-1)*$data->perPage()+$loop->iteration }}</td>
                                        <td>{{ $rt->nomor_rt }}</td>
                                        <td>{{ $rt->rw->nomor_rw ?? '-' }}</td>
                                        <td>{{ $rt->ketuaRt->nama ?? '-' }}</td>
                                        <td>{{ $rt->keterangan ?? '-' }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('rt.edit', $rt->rt_id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('rt.destroy', $rt->rt_id) }}" method="POST"
                                                  class="d-inline" onsubmit="return confirm('Hapus data?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr><td colspan="6" class="text-center text-muted">Belum ada data</td></tr>
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
