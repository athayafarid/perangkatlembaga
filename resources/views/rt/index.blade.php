@extends('layouts.app')
@section('title', 'Data RT')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-list-ul"></i> Data RT</h4>
            <a href="{{ route('rt.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah
            </a>
        </div>

        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nomor RT</th>
                        <th>Nomor RW</th>
                        <th>Ketua RT</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $rt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rt->nomor_rt }}</td>
                        <td>{{ $rt->rw->nomor_rw ?? '-' }}</td>
                        <td>{{ $rt->ketuaRt->nama ?? '-' }}</td>
                        <td>{{ $rt->keterangan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('rt.edit', $rt->rt_id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('rt.destroy', $rt->rt_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data</td>
                    </tr>
                    @endforelse
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
    timer: 1800,
    showConfirmButton: false
});
</script>
@endif
@endsection
