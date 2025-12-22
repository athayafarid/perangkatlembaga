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
                                <h5 class="m-b-10">Home</h5>
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

            <!-- [ Main Content ] start -->
            <div class="row">

    {{-- Statistik Penduduk --}}
    @php
        $cards = [
            ['title'=>'Total Warga','value'=>$warga,'icon'=>'ti-users','color'=>'primary'],
    
            ['title'=>'Total RT','value'=>$rt,'icon'=>'ti-layout','color'=>'warning'],
            ['title'=>'Total RW','value'=>$rw,'icon'=>'ti-map','color'=>'danger'],
        ];
    @endphp

    @foreach ($cards as $c)
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">{{ $c['title'] }}</h6>
                    <h4 class="mb-0 fw-bold">{{ $c['value'] }}</h4>
                </div>
                <div class="avtar avtar-l bg-light-{{ $c['color'] }} text-{{ $c['color'] }}">
                    <i class="ti {{ $c['icon'] }} f-24"></i>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Statistik Kelembagaan --}}
<div class="row mt-4">
    <div class="col-xl-12">
        <h5 class="mb-3">Statistik Kelembagaan Desa</h5>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card bg-light-primary">
            <div class="card-body">
                <h6>Perangkat Desa</h6>
                <h3 class="fw-bold">{{ $perangkat }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card bg-light-success">
            <div class="card-body">
                <h6>Lembaga Desa</h6>
                <h3 class="fw-bold">{{ $lembaga }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card bg-light-warning">
            <div class="card-body">
                <h6>Jabatan Lembaga</h6>
                <h3 class="fw-bold">{{ $jabatan }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card bg-light-danger">
            <div class="card-body">
                <h6>Anggota Lembaga</h6>
                <h3 class="fw-bold">{{ $anggota }}</h3>
            </div>
        </div>
    </div>
</div>

    {{--  end main content    --}}
@endsection
