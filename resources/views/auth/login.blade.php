<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Tiket Kapal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            width: 380px;
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            color: #fff;
        }

        .login-header {
            background: linear-gradient(90deg, #facc15, #f59e0b);
            color: #0f172a;
            font-weight: bold;
            text-align: center;
            padding: 18px;
            font-size: 18px;
        }

        .login-body {
            padding: 25px;
        }

        .form-control {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            color: #fff;
            border-radius: 10px;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.12);
            border-color: #facc15;
            box-shadow: none;
            color: #fff;
        }

        label {
            font-size: 13px;
            margin-bottom: 5px;
            color: #cbd5e1;
        }

        .btn-login {
            background: linear-gradient(90deg, #facc15, #f59e0b);
            border: none;
            color: #0f172a;
            font-weight: 600;
            padding: 10px;
            border-radius: 10px;
            transition: 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(250, 204, 21, 0.3);
        }

        .alert {
            font-size: 13px;
        }

        .title {
            text-align: center;
            margin-bottom: 15px;
            color: #facc15;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="login-header">
        <i class="fas fa-ship"></i> SISTEM TIKET KAPAL
    </div>

    <div class="login-body">

        <div class="title">Login ke Akun Anda</div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
            </div>

            <button class="btn btn-login w-100">
                Login
            </button>
        </form>

    </div>

</div>

<script src="https://kit.fontawesome.com/a2d9d5c6b0.js"></script>

</body>
</html>