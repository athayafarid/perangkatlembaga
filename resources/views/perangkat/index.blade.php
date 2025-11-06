@extends('layouts.app')
@section('title', 'Data Perangkat Desa')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-person-badge"></i> Data Perangkat Desa</h4>
            <a href="{{ route('perangkat.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah
            </a>
        </div>

        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Periode</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
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
                            <a href="{{ route('perangkat.edit', $p->perangkat_id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('perangkat.destroy', $p->perangkat_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
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
    </div>
</div>

@if(session('success'))
<script>
Swal.fire({icon: 'success', title: 'Berhasil!', text: '{{ session("success") }}', timer: 1800, showConfirmButton: false});
</script>
@endif
@endsection
