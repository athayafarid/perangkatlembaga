@extends('layouts.admin.app')
@section('title', 'Data Perangkat Desa')

@section('content')

    <style>
        .card-form {
            border: none;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(13, 60, 97, 0.12);
            overflow: hidden;
        }

        .card-header-green {
            background: linear-gradient(90deg, #198754 0%, #28b76b 100%);
            padding: 20px 24px;
            color: #fff;
            border: none;
        }

        .search-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, .25);
            border-color: #198754;
        }

        .table thead {
            background: #d4f5e2;
        }

        .btn-action {
            border-radius: 8px;
            padding: 6px 10px;
        }
    </style>

    <div class="pc-container">
        <div class="pc-content">

            <div class="container mt-4">

                <div class="card card-form">

                    {{-- HEADER --}}
                    <div class="card-header-green d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-people-fill"></i> Data Perangkat Desa
                        </h4>
                        <a href="{{ route('perangkat_desa.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg"></i> Tambah
                        </a>
                    </div>

                    <div class="card-body p-4">

                        {{-- SEARCH --}}
                        <form method="GET" action="{{ route('perangkat_desa.index') }}" class="mb-4"
                            style="max-width:380px;">
                            <div class="input-group">
                                <input type="text" name="q" value="{{ request('q') }}"
                                    class="form-control search-input" placeholder="Cari nama perangkat...">

                                <button class="btn btn-success">
                                    <i class="bi bi-search"></i>
                                </button>

                                @if (request('q'))
                                    <a href="{{ route('perangkat_desa.index') }}"
                                        class="btn btn-outline-secondary">Clear</a>
                                @endif
                            </div>
                        </form>


                        {{-- TABLE --}}
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="text-dark fw-semibold">
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
                                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>

                                            <td>
                                                @if ($p->foto)
                                                    <img src="{{ asset('storage/' . $p->foto) }}" width="50"
                                                        height="50" class="rounded-circle object-fit-cover">
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
                                                    class="btn btn-warning btn-sm btn-action">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <form id="delete-{{ $p->perangkat_id }}"
                                                    action="{{ route('perangkat_desa.destroy', $p->perangkat_id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-danger btn-sm btn-action"
                                                        onclick="deleteConfirm('delete-{{ $p->perangkat_id }}')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>

                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-3">
                                                Tidak ada data ditemukan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                        {{-- PAGINATION --}}
                        <div class="d-flex justify-content-end mt-3">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteConfirm(formId) {
            Swal.fire({
                title: 'Hapus Data?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>


@endsection
