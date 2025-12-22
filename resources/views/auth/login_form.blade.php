<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Perangkat Lembaga</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(0, 72, 255, 0), rgba(0, 198, 255, 0.85)),
                url('https://asset.kompas.com/crops/kVzwG0Rvuc3SMfmt_3O3URH831A=/0x0:0x0/1200x800/data/photo/2022/03/30/624350e536f39.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            display: flex;
            align-items: center;
            gap: 60px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            padding: 40px 60px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            animation: fadeUp 0.8s ease;
        }

        .login-box {
            width: 380px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-title {
            color: #0048ff;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .btn-login {
            background: #0048ff;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
        }

        .btn-login:hover {
            background: #0036d1;
        }

        .right-info {
            max-width: 360px;
            text-align: center;
            color: #b80e0e;
        }

        .right-info img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        @media (max-width: 992px) {
            .login-container {
                flex-direction: column-reverse;
                padding: 30px;
            }
        }

        /* ===== SIDEBAR HEADER ===== */
.sidebar-header {
    padding: 20px 12px 16px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    margin-bottom: 12px;
}

.brand-logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
}

/* LOGO */
.brand-logo img {
    max-width: 250px;        /* KUNCI: jangan besar */
    height: auto;
    object-fit: contain;
    margin-bottom: 8px;
}

/* TEKS DI BAWAH LOGO */
.brand-text {
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1px;
    color: #aab4ff;
    text-align: center;
}

    </style>
</head>

<body>

    <div class="login-container">

        <!-- FORM LOGIN -->
        <div class="login-box">
            <h2 class="text-center mb-1">Welcome to</h2>
            <h1 class="text-center mb-3" style="color:#0048ff;font-weight:700;">Perangkat Lembaga</h1>
            <p class="login-title">Admin Login</p>

            @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: '{{ $errors->first() }}',
                        confirmButtonColor: '#0048ff'
                    });
                </script>
            @endif

            <form action="{{ url('/auth/login') }}" method="POST">
                @csrf

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"
                            required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            Tampilkan
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-login">Login</button>

                <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                    <div></div>
                    <a href="{{ url('/forgot-password') }}" class="text-decoration-none"
                        style="font-size:13px; color:#0d6efd;">
                        Lupa password?
                    </a>
                </div>


                <div class="text-center mt-3">
                    <span class="text-muted">Belum punya akun?</span>
                    <a href="{{ route('register') }}" class="fw-semibold">Buat akun terlebih dahulu</a>
                </div>
            </form>

            <div class="text-center mt-4">
                <small class="text-muted">Masuk menggunakan akun admin yang terdaftar.</small>
            </div>
        </div>

        <!-- INFO -->
        {{-- LOGO SIDEBAR --}}
        <div class="m-header sidebar-header">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                <span class="brand-text">PERANGKAT</span>
            </a>
        </div>


    </div>

    <script>
        const toggle = document.getElementById('togglePassword');
        const pwd = document.getElementById('password');
        toggle.addEventListener('click', () => {
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
            toggle.textContent = pwd.type === 'password' ? 'Tampilkan' : 'Sembunyikan';
        });
    </script>

</body>

</html>
