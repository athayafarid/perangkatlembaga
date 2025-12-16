<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | PlusAdmin</title>

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
            padding: 0;

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
            transition: 0.3s;
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
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
        }

        .right-info h2 {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .right-info p {
            font-size: 0.95rem;
            line-height: 1.6;
        }

        @media (max-width: 992px) {
            body {
                justify-content: center;
                padding: 0;
            }

            .login-container {
                flex-direction: column-reverse;
                background: rgba(255, 255, 255, 0.95);
                box-shadow: none;
                padding: 30px;
            }

            .right-info {
                color: #0048ff;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <!-- Bagian Kiri: Form Login -->
        <div class="login-box">
            <h2 class="text-center mb-1">Welcome to</h2>
            <h1 class="text-center mb-3" style="color: #0048ff; font-weight: 700;">Bina Desa</h1>
            <p class="login-title">Admin Login</p>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Login Gagal:</strong> {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: '{{ $errors->first() }}',
                        confirmButtonColor: '#0048ff'
                    });
                </script>
            @endif

            <form action="{{ url('/auth/login') }}" method="POST" role="form" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input id="username" name="username" type="text"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username"
                        value="{{ old('username') }}" required autofocus>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"
                            required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">Tampilkan</button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    <a href="{{ url('/auth/forgot') }}" class="text-decoration-none small">Lupa password?</a>
                </div>

                <button type="submit" class="btn btn-login">Login</button>
            </form>

            <div class="text-center mt-4">
                <small class="text-muted">Masuk menggunakan akun admin yang terdaftar.</small>
            </div>
        </div>

        <!-- Bagian Kanan: Logo & Deskripsi -->
        <div class="right-info">
            <img src="https://marketplace.canva.com/EAGKWMALAAQ/2/0/1600w/canva-biru-gelap-putih-lingkaran-lembaga-pendidikan-logo-RsOAXGYnMCs.jpg"
                alt="Logo Bina Desa">
            <h2>Bina Desa</h2>
            <p>
                unsur pelaksana dalam struktur organisasi lembaga desa yang bertugas membantu pelaksanaan program,
                kegiatan, dan pelayanan kepada masyarakat.
                Mereka berperan dalam mendukung fungsi lembaga sesuai bidangnya masing-masing, seperti pemberdayaan
                masyarakat, administrasi, keamanan, dan sosial kemasyarakatan, agar roda pemerintahan dan pembangunan
                desa berjalan efektif dan tertata.
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            const toggle = document.getElementById('togglePassword');
            const pwd = document.getElementById('password');
            if (!toggle || !pwd) return;

            toggle.addEventListener('click', function() {
                const showing = pwd.type === 'text';
                pwd.type = showing ? 'password' : 'text';
                toggle.textContent = showing ? 'Tampilkan' : 'Sembunyikan';
            });
        })();
    </script>

</body>

<a href="https://api.whatsapp.com/send/?phone=62895396200200&text=Halo+Admin+Honda+Cengkareng+%EF%BF%BD%0ASaya+perlu+bantuan+terkait+pemilihan+layanan+yang+tepat.+Boleh+dibantu%3F&type=phone_number&app_absent=0"
style="bottom: 10%" class="btn btn-secondary btn-lg-square rounded-circle back-to-top" >
<img src="https://cdn-icons-png.flaticon.com/128/3670/3670051.png" style="width:100%; height:100%;" alt=""></a>

</html>
