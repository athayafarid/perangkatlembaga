<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('dashboard') }}" class="b-brand text-primary">
                <img src="../assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo">
            </a>
        </div>

        <div class="navbar-content d-flex flex-column" style="height:100%;">

            {{-- MENU UTAMA --}}
            <ul class="pc-navbar flex-grow-1">

                <li class="pc-item">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Fitur Utama</label>
                    <i class="ti ti-dashboard"></i>
                </li>


                <li class="pc-item">
                    <a href="{{ route('rt.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-map-pin"></i></span>
                        <span class="pc-mtext">Data RT</span>
                    </a>
                </li>
                 <li class="pc-item">
                    <a href="{{ route('rw.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-map"></i></span>
                        <span class="pc-mtext">Data RW</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('perangkat_desa.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
                        <span class="pc-mtext">Perangkat</span>
                    </a>
                </li>

                 <li class="pc-item">
                    <a href="{{ route('lembaga_desa.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
                        <span class="pc-mtext">Lembaga</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('jabatan_lembaga.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
                        <span class="pc-mtext">Jabatan</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('keluarga.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                        <span class="pc-mtext">Data Keluarga</span>
                    </a>
                </li>




                <li class="pc-item">
                    <a href="{{ route('warga.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-typography"></i></span>
                        <span class="pc-mtext">Data Warga</span>
                    </a>
                </li>
            </ul>

            {{-- TOMBOL LOGOUT --}}
            <div class="p-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                        <i class="ti ti-logout me-2"></i> Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>
