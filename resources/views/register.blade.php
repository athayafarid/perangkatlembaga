<!DOCTYPE html>
<html lang="id">

<head>

    <style>
        /* ===============================
   BACKGROUND GLOBAL
================================ */
        /* ===============================
   DARK FULL BODY
================================ */
        /* RESET */
        * {
            box-sizing: border-box;
        }

        /* BODY */
        .auth-body {
            margin: 0;
            min-height: 100vh;
            background: #020617;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            overflow: hidden;
        }

        /* BACKGROUND */
        .auth-bg {
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at top right, #1e3a8a55, transparent 45%),
                radial-gradient(circle at bottom left, #0f766e55, transparent 45%),
                linear-gradient(135deg, #020617, #0b1220);
            z-index: 0;
        }

        .auth-bg::after {
            content: "";
            position: absolute;
            inset: 0;
            background: url("https://upload.wikimedia.org/wikipedia/commons/9/9a/Garuda_Pancasila.svg") center/320px no-repeat;
            opacity: 0.04;
        }

        /* WRAPPER */
        .auth-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        /* CARD */
        .auth-card {
            width: 420px;
            background: rgba(15, 23, 42, 0.92);
            border-radius: 22px;
            padding: 36px 34px;
            color: #e5e7eb;
            box-shadow: 0 30px 70px rgba(0, 0, 0, .65);
            border: 1px solid rgba(212, 175, 55, .25);
            backdrop-filter: blur(14px);
        }

        /* HEADER */
        .auth-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .auth-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: radial-gradient(circle, #1e293b, #020617);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-logo i {
            font-size: 36px;
            color: #d4af37;
        }

        .auth-header h4 {
            margin: 0;
            font-weight: 700;
            color: #f8fafc;
        }

        .auth-header p {
            font-size: 14px;
            color: #94a3b8;
        }

        /* FORM */
        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            font-size: 13px;
            color: #cbd5f5;
            margin-bottom: 6px;
            display: block;
        }

        .form-control {
            width: 100%;
            height: 44px;
            border-radius: 12px;
            border: 1px solid #1e293b;
            background: #020617;
            color: #f8fafc;
            padding: 0 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, .15);
        }

        /* BUTTON */
        .btn-primary {
            height: 46px;
            width: 100%;
            border-radius: 14px;
            background: linear-gradient(135deg, #1e3a8a, #d4af37);
            border: none;
            color: #020617;
            font-weight: 700;
            cursor: pointer;
        }

        /* FOOTER */
        .auth-footer {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
            color: #94a3b8;
        }

        .auth-footer a {
            color: #facc15;
            font-weight: 600;
            text-decoration: none;
        }

        /* ANIMATION */
        .animate-fade {
            animation: fadeUp .9s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(.96);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>

    <meta charset="UTF-8">
    <title>Buat Akun</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body class="auth-body">

    <div class="auth-bg"></div>

    <div class="auth-wrapper">
        <div class="auth-card animate-fade">

            <div class="auth-header">
                <div class="auth-logo">
                    <i class="ti ti-building-bank"></i>
                </div>
                <h4>Bina Desa</h4>
                <p>Sistem Perangkat & Lembaga</p>
            </div>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap"
                        required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <div class="form-group">
                <select name="role" required>
                    <option value="" disabled selected>Pilih Role Pengguna</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Warga" {{ old('role') == 'Warga' ? 'selected' : '' }}>Warga</option>
                </select>
            </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password"
                        required>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Ulangi password" required>
                </div>

                <button class="btn-primary">
                    Daftar
                </button>
            </form>


            <div class="auth-footer">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </div>

        </div>
    </div>

</body>


</html>
