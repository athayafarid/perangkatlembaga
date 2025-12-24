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
                        <div class="welcome-box">
                            <div>
                                <h4>👋 Selamat Datang, Muhammad Farid Athaya</h4>
                                <span class="badge bg-success">Admin Online</span>
                            </div>
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
                        <div class="stat-card stat-{{ $c['color'] }}">
                            <div class="stat-icon">
                                <i class="ti {{ $c['icon'] }}"></i>
                            </div>

                            <div class="stat-content">
                                <span class="stat-title">{{ $c['title'] }}</span>
                                <h2 class="stat-number">{{ $c['value'] }}</h2>
                                <small class="stat-meta">Update data terakhir</small>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Statistik Kelembagaan --}}
            <div class="row g-4 mt-4">

                @php
                    $stats = [
                        [
                            'title' => 'Perangkat Desa',
                            'value' => $perangkat,
                            'icon' => 'ti-building',
                            'color' => 'blue',
                        ],
                        ['title' => 'Lembaga Desa', 'value' => $lembaga, 'icon' => 'ti-briefcase', 'color' => 'green'],
                        ['title' => 'Jabatan Lembaga', 'value' => $jabatan, 'icon' => 'ti-id', 'color' => 'orange'],
                        [
                            'title' => 'Anggota Lembaga',
                            'value' => $anggota,
                            'icon' => 'ti-user-check',
                            'color' => 'red',
                        ],
                    ];
                @endphp

                @foreach ($stats as $s)
                    <div class="col-md-6 col-xl-3">
                        <div class="pro-stat-card {{ $s['color'] }}">
                            <div class="icon">
                                <i class="ti {{ $s['icon'] }}"></i>
                            </div>

                            <div class="content">
                                <span>{{ $s['title'] }}</span>
                                <h2>{{ $s['value'] }}</h2>
                            </div>

                            <div class="indicator"></div>
                        </div>
                    </div>
                @endforeach

            </div>



            {{--  end main content    --}}
        @endsection
