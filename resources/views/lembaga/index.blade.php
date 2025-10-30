@extends('layouts.app')

@section('title', 'Data Lembaga Desa')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header text-white" style="background:#6f42c1;">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-building"></i> Data Lembaga Desa</h4>
                <a href="{{ route('lembaga.create') }}" class="btn btn-light btn-sm"><i class="bi bi-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lembaga</th>
                        <th>Keterangan</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lembaga as $l)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $l->nama_lembaga }}</td>
                        <td>{{ $l->keterangan }}</td>
                        <td>
                            <a href="{{ route('lembaga.edit', $l->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('lembaga.destroy', $l->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if(session('success'))
<script>
Swal.fire({ icon: 'success', title: 'Berhasil', text: '{{ session("success") }}', showConfirmButton: false, timer: 1800 });
</script>
@endif
@endsection
