<nav class="pc-sidebar sidebar">
    <div class="navbar-wrapper">

        {{-- LOGO --}}
        {{-- LOGO SIDEBAR --}}
<div class="pc-sidebar-header text-center py-4">
    <img src="{{ asset('assets/images/logo.png') }}"
         alt="Logo Desa"
         class="img-fluid sidebar-logo mb-2">

    <h6 class="text-white fw-bold mb-0">PERANGKAT DESA</h6>
</div>


        <div class="navbar-content d-flex flex-column" style="height:100%;">

            {{-- MENU UTAMA --}}
            <ul class="pc-navbar flex-grow-1">

                {{-- DASHBOARD --}}
                <li class="pc-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                {{-- CAPTION --}}
                <li class="pc-item pc-caption">
                    <label>Fitur Utama</label>
                    <i class="ti ti-apps"></i>
                </li>

                {{-- RT --}}
                <li class="pc-item {{ request()->routeIs('rt.*') ? 'active' : '' }}">
                    <a href="{{ route('rt.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-map-pin"></i></span>
                        <span class="pc-mtext">Data RT</span>
                    </a>
                </li>

                {{-- RW --}}
                <li class="pc-item {{ request()->routeIs('rw.*') ? 'active' : '' }}">
                    <a href="{{ route('rw.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-map"></i></span>
                        <span class="pc-mtext">Data RW</span>
                    </a>
                </li>

                {{-- PERANGKAT --}}
                <li class="pc-item {{ request()->routeIs('perangkat_desa.*') ? 'active' : '' }}">
                    <a href="{{ route('perangkat_desa.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-users"></i></span>
                        <span class="pc-mtext">Perangkat</span>
                    </a>
                </li>

                {{-- LEMBAGA --}}
                <li class="pc-item {{ request()->routeIs('lembaga_desa.*') ? 'active' : '' }}">
                    <a href="{{ route('lembaga_desa.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-building"></i></span>
                        <span class="pc-mtext">Lembaga</span>
                    </a>
                </li>

                {{-- JABATAN --}}
                <li class="pc-item {{ request()->routeIs('jabatan_lembaga.*') ? 'active' : '' }}">
                    <a href="{{ route('jabatan_lembaga.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-id-badge"></i></span>
                        <span class="pc-mtext">Jabatan</span>
                    </a>
                </li>

                {{-- KELUARGA --}}
                {{-- <li class="pc-item {{ request()->routeIs('keluarga.*') ? 'active' : '' }}">
                    <a href="{{ route('keluarga.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-home"></i></span>
                        <span class="pc-mtext">Data Keluarga</span>
                    </a>
                </li> --}}

                {{-- WARGA --}}
                <li class="pc-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                    <a href="{{ route('warga.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user"></i></span>
                        <span class="pc-mtext">Data Warga</span>
                    </a>
                </li>

                {{-- MULTI UPLOAD --}}
                <li class="pc-item {{ request()->routeIs('uploads*') ? 'active' : '' }}">
                    <a href="{{ route('uploads') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-upload"></i></span>
                        <span class="pc-mtext">Multi Uploads</span>
                    </a>
                </li>
            </ul>

            {{-- LOGOUT --}}


        </div>
    </div>
</nav>
