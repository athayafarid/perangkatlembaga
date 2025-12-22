@extends('layouts.admin.app')

@section('content')
    <div class="pc-container">
        <div class="pc-content">

            {{-- Header --}}
            <div class="page-header mb-4">
                <h4 class="fw-bold mb-1">Identitas Pengembang</h4>
                <p class="text-muted mb-0">Informasi pengembang sistem</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <div class="card border-0 shadow-sm developer-card">
                        <div class="card-body text-center p-4">

                            {{-- Foto Asli --}}
                            <div class="hero-profile text-center mb-4">
                                <img src="{{ asset('assets/images/developer/farid.JPEG') }}" class="developer-photo mb-3">

                                {{-- Identitas --}}
                                <h3 class="fw-bold mb-0">Muhammad Farid Athaya</h3>
                                <p class="text-soft mb-1">NIM: 2457301076</p>

                                <span class="badge badge-glow">Sistem Informasi</span>

                                <p class="role-text mt-2">
                                    Web Developer · Laravel
                                </p>
                            </div>

                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <span class="chip dark">Laravel</span>
                                <span class="chip gray">Bootstrap</span>
                                <span class="chip green">MySQL</span>
                            </div>

                            {{-- Deskripsi --}}
                            <p class="text-muted mt-3">
                                Pengembang aplikasi sistem informasi perangkat dan lembaga desa
                                berbasis web menggunakan Laravel dan Bootstrap.
                            </p>


                            {{-- Statistik Developer --}}
                            <div class="row text-center stats-row mt-4">
                                <div class="col-4">
                                    <div class="stat-box blue">
                                        <h3>10+</h3>
                                        <p>Module Sistem</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-box green">
                                        <h3>Laravel</h3>
                                        <p>Framework Utama</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-box orange">
                                        <h3>2024</h3>
                                        <p>Tahun Pengembangan</p>
                                    </div>
                                </div>
                            </div>


                            {{-- Timeline --}}
                            <div class="mt-4 text-start">

                                <h5 class="mt-5 mb-3 text-center">Perjalanan Pengembangan</h5>

                                <ul class="timeline">
                                    <li>
                                        <span>2024</span>
                                        <p>Analisis kebutuhan sistem perangkat & lembaga desa</p>
                                    </li>
                                    <li>
                                        <span>2024</span>
                                        <p>Perancangan database & struktur aplikasi Laravel</p>
                                    </li>
                                    <li>
                                        <span>2025</span>
                                        <p>Implementasi dashboard & modul manajemen data</p>
                                    </li>
                                </ul>

                            </div>

                            {{-- Sosial Media --}}
                            <div class="social-links-img mt-4">
                                <a href="https://linkedin.com" target="_blank" data-title="LinkedIn">
                                    <img src="{{ asset('assets/images/social/linkedin.png') }}" alt="LinkedIn">
                                </a>

                                <a href="https://github.com" target="_blank" data-title="GitHub">
                                    <img src="{{ asset('assets/images/social/github.png') }}" alt="GitHub">
                                </a>

                                <a href="https://instagram.com" target="_blank" data-title="Instagram">
                                    <img src="{{ asset('assets/images/social/instagram.png') }}" alt="Instagram">
                                </a>

                                <a href="https://mail.google.com/mail/?view=cm&to=athaya24si@mahasiswa.pcr.ac.id&su=Kontak%20Developer&body=Halo%20Farid,"
                                    target="_blank" data-title="Email">
                                    <img src="{{ asset('assets/images/social/email.png') }}" alt="Email">
                                </a>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-primary px-4">Hubungi Saya</button>
                                <button class="btn btn-outline-light px-4 ms-2">Download CV</button>
                            </div>


                            {{-- Call to Action --}}





                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
