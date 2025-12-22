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
                                <h4 class="dashboard-title mb-1">
                                    Dashboard Administrasi
                                </h4>
                                <p class="text-muted mb-0">
                                    Ringkasan data kependudukan & kelembagaan desa
                                </p>

                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Home</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            {{-- ================= WELCOME USER ================= --}}
            @php
                $user = Auth::user();
            @endphp

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="fw-bold mb-1">
                                    👋 Selamat Datang, {{ $user->name }}
                                </h4>
                                <p class="text-muted mb-0">
                                    Role: <strong>{{ ucfirst($user->role ?? 'Admin') }}</strong>
                                </p>
                            </div>
                            <span class="badge bg-success px-3 py-2">
                                Online
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- =============== END WELCOME ================= --}}

            <!-- [ Main Content ] start -->
            <div class="row g-4">

                {{-- Statistik Penduduk --}}
                @php
                    $cards = [
                        ['title' => 'Total Warga', 'value' => $warga, 'icon' => 'ti-users', 'color' => 'primary'],
                        ['title' => 'Total RT', 'value' => $rt, 'icon' => 'ti-layout', 'color' => 'warning'],
                        ['title' => 'Total RW', 'value' => $rw, 'icon' => 'ti-map', 'color' => 'danger'],
                    ];
                @endphp

                @foreach ($cards as $c)
                    <div class="col-md-6 col-xl-4">
                        <div class="card stat-card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="text-muted mb-1">{{ $c['title'] }}</h6>
                                        <h3 class="fw-bold mb-0">{{ $c['value'] }}</h3>
                                    </div>
                                    <div class="stat-icon bg-light-{{ $c['color'] }} text-{{ $c['color'] }}">
                                        <i class="ti {{ $c['icon'] }}"></i>
                                    </div>
                                </div>

                                <div class="progress progress-thin">
                                    <div class="progress-bar bg-{{ $c['color'] }}" style="width: 70%"></div>
                                </div>
                                <small class="text-muted">Update data terakhir</small>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Statistik Kelembagaan --}}
            <div class="row mt-5">
                <div class="col-12 mb-3">
                    <h5 class="dashboard-title">
                        Statistik Kelembagaan Desa
                    </h5>
                </div>

                @php
                    $lembagaCards = [
                        [
                            'title' => 'Perangkat Desa',
                            'value' => $perangkat,
                            'icon' => 'ti-building',
                            'color' => 'primary',
                        ],
                        [
                            'title' => 'Lembaga Desa',
                            'value' => $lembaga,
                            'icon' => 'ti-briefcase',
                            'color' => 'success',
                        ],
                        ['title' => 'Jabatan Lembaga', 'value' => $jabatan, 'icon' => 'ti-id', 'color' => 'warning'],
                        [
                            'title' => 'Anggota Lembaga',
                            'value' => $anggota,
                            'icon' => 'ti-user-check',
                            'color' => 'danger',
                        ],
                    ];
                @endphp

                @foreach ($lembagaCards as $l)
                    <div class="col-md-6 col-xl-3">
                        <div class="card stat-card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="stat-icon mx-auto mb-3 bg-light-{{ $l['color'] }} text-{{ $l['color'] }}">
                                    <i class="ti {{ $l['icon'] }}"></i>
                                </div>
                                <h6 class="mb-1">{{ $l['title'] }}</h6>
                                <h3 class="fw-bold">{{ $l['value'] }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{--  end main content    --}}
        @endsection
