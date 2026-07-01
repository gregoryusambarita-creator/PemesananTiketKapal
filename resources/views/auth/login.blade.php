<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Login | Sistem Pemesanan Tiket Kapal Ferry</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            min-height:100vh;
            margin:0;
            display:flex;
            justify-content:center;
            align-items:center;
            background:
            linear-gradient(rgba(15,23,42,.82),rgba(15,23,42,.82)),
            url('https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            background-position:center;
            font-family:'Segoe UI',sans-serif;
        }

        .login-box{

            width:100%;
            max-width:430px;

        }

        .login-card{

            background:rgba(255,255,255,.10);
            backdrop-filter:blur(18px);
            border:1px solid rgba(255,255,255,.15);
            border-radius:24px;
            overflow:hidden;
            box-shadow:0 20px 60px rgba(0,0,0,.45);

        }

        .login-header{

            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:white;
            text-align:center;
            padding:35px;

        }

        .login-header .icon{

            width:80px;
            height:80px;
            border-radius:50%;
            background:white;
            color:#2563eb;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:35px;
            margin:auto;
            margin-bottom:20px;

        }

        .login-header h2{

            font-weight:700;
            margin-bottom:8px;

        }

        .login-header p{

            color:#dbeafe;
            margin:0;

        }

        .login-body{

            padding:35px;

        }

        .form-label{

            color:white;
            font-weight:600;

        }

        .form-control{

            height:52px;
            border-radius:12px;
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.18);
            color:white;

        }

        .form-control::placeholder{

            color:#cbd5e1;

        }

        .form-control:focus{

            background:rgba(255,255,255,.12);
            color:white;
            border-color:#60a5fa;
            box-shadow:none;

        }

        .btn-login{

            height:52px;
            border:none;
            border-radius:12px;
            font-weight:700;
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            transition:.3s;

        }

        .btn-login:hover{

            transform:translateY(-2px);
            box-shadow:0 10px 25px rgba(37,99,235,.45);

        }

        .footer{

            text-align:center;
            color:#cbd5e1;
            margin-top:25px;
            font-size:13px;

        }

        .alert{

            border-radius:12px;

        }

    </style>

</head>

<body>

<div class="login-box">

    <div class="login-card">

        <div class="login-header">

            <div class="icon">

                <i class="fas fa-ship"></i>

            </div>

            <h2>Sistem Tiket Kapal Ferry</h2>

            <p>Ajibata • Tomok</p>

        </div>

        <div class="login-body">

            @if(session('error'))

                <div class="alert alert-danger">

                    <i class="fas fa-circle-exclamation me-2"></i>

                    {{ session('error') }}

                </div>

            @endif

            <form action="{{ route('login') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">

                        <i class="fas fa-envelope text-primary me-2"></i>

                        Email

                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Masukkan email"
                           required>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        <i class="fas fa-lock text-primary me-2"></i>

                        Password

                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-primary btn-login w-100">

                    <i class="fas fa-right-to-bracket me-2"></i>

                    Login

                </button>

            </form>

        </div>

    </div>

    <div class="footer">

        © {{ date('Y') }} Sistem Pemesanan Tiket Kapal Ferry<br>

        UMIMED - Universitas Methodist Indonesia Medan

    </div>

</div>

</body>

</html>