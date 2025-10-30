@extends('layouts.app')

@section('title', 'Data Anggota Lembaga')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header text-white" style="background:#dc3545;">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-people-fill"></i> Data Anggota Lembaga</h4>
                <a href="{{ route('anggota.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus"></i> Tambah
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Lembaga</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->jabatan->nama_jabatan ?? '-' }}</td>
                        <td>{{ $a->lembaga->nama_lembaga ?? '-' }}</td>
                        <td>{{ $a->no_telp ?? '-' }}</td>
                        <td>{{ $a->email ?? '-' }}</td>
                        <td>{{ $a->alamat ?? '-' }}</td>
                        <td>
                            <a href="{{ route('anggota.edit', $a->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
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
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    showConfirmButton: false,
    timer: 1800
});
</script>
@endif
@endsection
