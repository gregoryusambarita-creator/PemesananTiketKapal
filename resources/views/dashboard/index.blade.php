@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">

    <!-- Hero -->
    <div class="card border-0 shadow-lg mb-4 overflow-hidden"
        style="border-radius:22px;
        background:linear-gradient(135deg,#0f172a 0%,#1e3a8a 55%,#2563eb 100%);">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="badge bg-light text-primary px-3 py-2 mb-3">
                        Dashboard Administrator
                    </span>

                    <h2 class="fw-bold text-white mb-3">
                         Sistem Pemesanan Tiket Kapal Ferry
                    </h2>

                    <h5 class="text-light mb-4">
                        Pelabuhan Ajibata — Tomok
                    </h5>

                    <p class="text-white-50 mb-4">

                        Selamat datang
                        <strong class="text-white">
                            {{ Auth::user()->name }}
                        </strong>

                        di Sistem Pemesanan Tiket Kapal Ferry.

                        Kelola kapal, rute, jadwal keberangkatan,
                        transaksi pemesanan, pembayaran,
                        serta laporan operasional secara real-time.

                    </p>

                    <div class="d-flex flex-wrap gap-2">

                        <span class="badge bg-primary p-2">
                            {{ date('d F Y') }}
                        </span>

                        <span class="badge bg-success p-2">
                            Sistem Online
                        </span>

                        <span class="badge bg-warning text-dark p-2">
                            {{ strtoupper(Auth::user()->role) }}
                        </span>

                    </div>

                </div>

                <div class="col-lg-4 text-center">

                    <i class="fas fa-ship text-white"
                       style="font-size:130px;opacity:.15;"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- Statistik -->

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Kapal
                            </small>

                            <h2 class="fw-bold mt-2 text-primary">
                                {{ $totalKapal }}
                            </h2>

                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-ship fa-2x text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Rute
                            </small>

                            <h2 class="fw-bold mt-2 text-success">
                                {{ $totalRute }}
                            </h2>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-route fa-2x text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Jadwal
                            </small>

                            <h2 class="fw-bold mt-2 text-warning">
                                {{ $totalJadwal }}
                            </h2>

                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-calendar-alt fa-2x text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Pemesanan
                            </small>

                            <h2 class="fw-bold mt-2 text-danger">
                                {{ $totalPemesanan }}
                            </h2>

                        </div>

                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-ticket-alt fa-2x text-danger"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Pendapatan -->

    <div class="card border-0 shadow-lg mt-4"
         style="border-radius:20px;">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h6 class="text-muted">
                        Total Pendapatan
                    </h6>

                    <h1 class="fw-bold text-success mb-2">

                        Rp {{ number_format($totalPendapatan,0,',','.') }}

                    </h1>

                    <p class="text-muted mb-0">

                        Total akumulasi pembayaran tiket yang telah
                        berhasil diproses oleh sistem.

                    </p>

                </div>

                <div class="col-md-4 text-end">

                    <i class="fas fa-wallet text-success"
                       style="font-size:90px;opacity:.18;"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- Informasi -->

    <div class="row mt-4">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">
                        Informasi Sistem
                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-borderless">

                        <tr>
                            <td width="40%">Nama Sistem</td>
                            <td><strong>Sistem Pemesanan Tiket Kapal Ferry</strong></td>
                        </tr>

                        <tr>
                            <td>Rute</td>
                            <td>Ajibata - Tomok</td>
                        </tr>

                        <tr>
                            <td>Role Login</td>
                            <td>{{ ucfirst(Auth::user()->role) }}</td>
                        </tr>

                        <tr>
                            <td>Tahun Operasional</td>
                            <td>{{ date('Y') }}</td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>

                                <span class="badge bg-success">
                                    Aktif
                                </span>

                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-lg-5">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">
                        Status Sistem
                    </h5>

                </div>

                <div class="card-body">

                    <div class="d-flex mb-3">

                        <div class="text-success me-3">

                            <i class="fas fa-circle-check fa-2x"></i>

                        </div>

                        <div>

                            <strong>Sistem Berjalan Normal</strong>

                            <div class="text-muted">
                                Semua layanan aktif.
                            </div>

                        </div>

                    </div>

                    <div class="d-flex mb-3">

                        <div class="text-primary me-3">

                            <i class="fas fa-database fa-2x"></i>

                        </div>

                        <div>

                            <strong>Database Terhubung</strong>

                            <div class="text-muted">
                                SQLite Connected.
                            </div>

                        </div>

                    </div>

                    <div class="d-flex">

                        <div class="text-warning me-3">

                            <i class="fas fa-shield-halved fa-2x"></i>

                        </div>

                        <div>

                            <strong>Keamanan Sistem</strong>

                            <div class="text-muted">
                                Login Authentication & Role Access.
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection