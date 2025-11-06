@extends('layouts.admin.app')
@section('content')
    {{--  start main content  --}}
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Jabatan Lembaga</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Fitur Utama</a></li>
                                <li class="breadcrumb-item" aria-current="page">Data Jabatan Lembaga</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            
            <div class="container mt-5">
                <div class="card card-jabatan">
                    <div class="card-header-blue d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h4>Data Jabatan Lembaga</h4>
                            <small>Kelola data jabatan lembaga dengan mudah dan cepat</small>
                        </div>
                        <a href="{{ route('jabatan_lembaga.create') }}" class="btn btn-add btn-sm mt-2 mt-md-0">
                            <i class="bi bi-plus"></i> Tambah Jabatan
                        </a>
                    </div>

                    <div class="card-body">
                        {{-- Form Pencarian --}}
                        <div class="row mb-3 g-2 align-items-center">
                            <div class="col-md-6">
                                <form method="GET" action="{{ route('jabatan_lembaga.index') }}" class="d-flex">
                                    <input type="text" name="q" value="{{ request('q') }}"
                                        class="form-control form-control-sm"
                                        placeholder="Cari nama jabatan, lembaga, deskripsi...">
                                    <button class="btn btn-primary btn-sm ms-2" type="submit">
                                        <i class="bi bi-search"></i> Cari
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Tabel Data --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-custom align-middle">
                                <thead>
                                    <tr>
                                        <th style="width:60px">No</th>
                                        <th>Nama Jabatan</th>
                                        <th>Lembaga</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center" style="width:150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jabatan as $index => $j)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $j->nama_jabatan }}</td>
                                            <td>{{ $j->lembaga->nama_lembaga ?? '-' }}</td>
                                            <td>{{ $j->deskripsi }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('jabatan_lembaga.edit', $j->id) }}"
                                                    class="btn btn-outline-primary btn-sm me-1">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('jabatan_lembaga.destroy', $j->id) }}" method="POST"
                                                    class="d-inline form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center empty-state py-4">
                                                Belum ada data jabatan. <a href="{{ route('jabatan_lembaga.create') }}">Tambah jabatan
                                                    baru</a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination dan Info --}}
                        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
                            <div class="text-muted small">
                                Menampilkan {{ $jabatan->count() }} dari
                                {{ $jabatan instanceof \Illuminate\Pagination\LengthAwarePaginator ? $jabatan->total() : $jabatan->count() }}
                                entri
                            </div>
                            <div>
                                @if ($jabatan instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{ $jabatan->withQueryString()->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SweetAlert2 -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 1800
                    });
                </script>
            @endif

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll(".btn-delete").forEach(button => {
                        button.addEventListener("click", function(e) {
                            const form = this.closest("form");
                            Swal.fire({
                                title: "Hapus data ini?",
                                text: "Data yang dihapus tidak dapat dikembalikan!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#d33",
                                cancelButtonColor: "#3085d6",
                                confirmButtonText: "Ya, hapus!",
                                cancelButtonText: "Batal"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        });
                    });
                });
            </script>

        </div>
    </div>
    {{--  end main content    --}}
@endsection
