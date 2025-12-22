<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password | Bina Desa</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(8,20,40,.9), rgba(8,20,40,.9)),
                url('/assets/img/bg-lembaga.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .reset-card {
            width: 420px;
            background: rgba(18, 28, 48, 0.95);
            border-radius: 18px;
            padding: 36px 32px;
            box-shadow: 0 25px 50px rgba(0,0,0,.45);
            color: #fff;
            position: relative;
        }

        .reset-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 18px;
            padding: 1.5px;
            background: linear-gradient(135deg,#d4af37,#f1e6b2,#d4af37);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            pointer-events: none;
        }

        .reset-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .reset-header h2 {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .reset-header p {
            font-size: 14px;
            color: #cbd5f5;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-size: 14px;
            margin-bottom: 6px;
            display: block;
            color: #e2e8f0;
        }

        .form-control {
            width: 100%;
            height: 46px;
            border-radius: 12px;
            border: 1px solid #334155;
            background: #0f172a;
            color: #fff;
            padding: 0 14px;
            outline: none;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.25);
        }

        .btn-reset {
            width: 100%;
            height: 46px;
            border-radius: 14px;
            border: none;
            font-weight: 600;
            color: #0f172a;
            background: linear-gradient(135deg,#22c55e,#facc15);
            cursor: pointer;
            transition: .3s;
        }

        .btn-reset:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 30px rgba(34,197,94,.35);
        }

        .alert {
            background: rgba(239,68,68,.15);
            color: #ef4444;
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 16px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="reset-card">
        <div class="reset-header">
            <h2>Reset Password</h2>
            <p>Masukkan password baru untuk akun Anda</p>
        </div>

        @if($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/reset-password">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password baru"
                       required>
            </div>

            <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Ulangi password"
                       required>
            </div>

            <button class="btn-reset">
                Reset Password
            </button>
        </form>
    </div>

</body>
</html>
