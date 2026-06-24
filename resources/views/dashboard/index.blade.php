@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">

```
<!-- Banner -->
<div class="card border-0 shadow-sm mb-4"
     style="background:linear-gradient(135deg,#0f172a,#2563eb); border-radius:20px;">

    <div class="card-body text-white p-4">

        <h2 class="fw-bold mb-2">
            🚢 Sistem Pemesanan Tiket Kapal Ferry
        </h2>

        <h5 class="mb-3">
            Rute Ajibata - Tomok
        </h5>

        <p class="mb-0">
            Selamat datang, <strong>{{ Auth::user()->name }}</strong>.
            Kelola data kapal, jadwal keberangkatan, pemesanan tiket,
            pembayaran dan laporan melalui dashboard ini.
        </p>

    </div>
</div>

<!-- Statistik -->
<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">

                <div class="mb-2">
                    <i class="fas fa-ship fa-2x text-primary"></i>
                </div>

                <h6 class="text-muted">Total Kapal</h6>

                <h2 class="fw-bold text-primary">
                    {{ $totalKapal }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">

                <div class="mb-2">
                    <i class="fas fa-route fa-2x text-success"></i>
                </div>

                <h6 class="text-muted">Total Rute</h6>

                <h2 class="fw-bold text-success">
                    {{ $totalRute }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">

                <div class="mb-2">
                    <i class="fas fa-calendar-alt fa-2x text-warning"></i>
                </div>

                <h6 class="text-muted">Total Jadwal</h6>

                <h2 class="fw-bold text-warning">
                    {{ $totalJadwal }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">

                <div class="mb-2">
                    <i class="fas fa-ticket-alt fa-2x text-danger"></i>
                </div>

                <h6 class="text-muted">Total Pemesanan</h6>

                <h2 class="fw-bold text-danger">
                    {{ $totalPemesanan }}
                </h2>

            </div>
        </div>
    </div>

</div>

<!-- Pendapatan -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body text-center p-4">

        <i class="fas fa-money-bill-wave fa-3x text-success mb-3"></i>

        <h5 class="text-muted">
            Total Pendapatan
        </h5>

        <h1 class="fw-bold text-success">
            Rp {{ number_format($totalPendapatan,0,',','.') }}
        </h1>

    </div>

</div>

<!-- Informasi Sistem -->
<div class="row">

    <div class="col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-header bg-primary text-white">
                Informasi Sistem
            </div>

            <div class="card-body">

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        🚢 Pemesanan Tiket Kapal Ferry
                    </li>

                    <li class="list-group-item">
                        📍 Rute Ajibata - Tomok - Ajibata
                    </li>

                    <li class="list-group-item">
                        👤 Login sebagai {{ Auth::user()->role }}
                    </li>

                    <li class="list-group-item">
                        📅 Tahun Operasional {{ date('Y') }}
                    </li>

                </ul>

            </div>

        </div>

    </div>

    <div class="col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-header bg-success text-white">
                Status Sistem
            </div>

            <div class="card-body">

                <div class="alert alert-success mb-2">
                    ✓ Sistem berjalan normal
                </div>

                <div class="alert alert-info mb-2">
                    ✓ Database terhubung
                </div>

                <div class="alert alert-primary">
                    ✓ Siap digunakan untuk transaksi tiket
                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
