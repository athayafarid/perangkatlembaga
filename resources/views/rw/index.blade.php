@extends('layouts.app')

@section('title', 'Data RW')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-house-door"></i> Data RW</h4>
        <a href="{{ route('rw.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah RW</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th>
                <th>Nomor RW</th>
                <th>Ketua RW</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $rw)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $rw->nomor_rw }}</td>
                <td>{{ $rw->ketuaRw->nama ?? '-' }}</td>
                <td>{{ $rw->keterangan ?? '-' }}</td>
                <td class="text-center">
                    <a href="{{ route('rw.edit', $rw->rw_id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('rw.destroy', $rw->rw_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
