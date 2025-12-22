@extends('layouts.admin.app')
@section('title', 'Data Perangkat Desa')

@section('content')



    <div class="pc-container perangkat-page rw-page">
        <div class="pc-content">

            <div class="container mt-4">

                <div class="card card-custom">
                    <div class="card-header-blue d-flex justify-content-between align-items-center">
                        <div class="header-text">
                            <h4>Data Perangkat Desa</h4>
                            <small>Kelola data perangkat desa</small>
                        </div>

                        <a href="{{ route('perangkat_desa.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus"></i> Tambah
                        </a>
                    </div>


                    {{-- SEARCH --}}
                    <form method="GET" action="{{ route('perangkat_desa.index') }}" class="mb-4"
                        style="max-width:420px;">
                        <div class="input-group">
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                placeholder="Cari nama perangkat...">
                            <button class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>

                            @if (request('q'))
                                <a href="{{ route('perangkat_desa.index') }}" class="btn btn-outline-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>



                    {{-- TABLE --}}
                    <div class="row g-4 rw-card-grid">
                        @forelse($data as $p)
                            <div class="col-md-6 col-xl-4">
                                <div class="rw-card h-100">

                                    <!-- HEADER -->
                                    <div class="rw-card-header">
                                        <div class="rw-title d-flex align-items-center gap-2">
                                            @if ($p->foto)
                                                <img src="{{ asset('storage/' . $p->foto) }}"
                                                    class="rounded-circle object-fit-cover" width="36" height="36">
                                            @else
                                                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                                    style="width:36px;height:36px;font-size:14px;">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            @endif

                                            <span>{{ $p->warga->nama ?? '-' }}</span>
                                        </div>

                                        <div class="rw-actions">
                                            <a href="{{ route('perangkat_desa.edit', $p->perangkat_id) }}"
                                                class="btn btn-icon btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form id="delete-{{ $p->perangkat_id }}"
                                                action="{{ route('perangkat_desa.destroy', $p->perangkat_id) }}"
                                                method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="button" class="btn btn-icon btn-danger"
                                                    onclick="deleteConfirm('delete-{{ $p->perangkat_id }}')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="rw-card-body">
                                        <div class="rw-row">
                                            <span class="label">Jabatan</span>
                                            <span class="value">{{ $p->jabatan }}</span>
                                        </div>

                                        <div class="rw-row">
                                            <span class="label">Periode</span>
                                            <span class="value">
                                                {{ $p->periode_mulai }} – {{ $p->periode_selesai }}
                                            </span>
                                        </div>

                                        <div class="rw-desc">
                                            {{ $p->keterangan ?? 'Tidak ada keterangan' }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center text-muted py-5">
                                Tidak ada data ditemukan
                            </div>
                        @endforelse
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
