index.blade.php

@extends('layouts.app')

@section('title','Laporan')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-chart-line me-2"></i>
                Laporan Sistem
            </h2>

            <p class="mb-0">
                Ringkasan statistik dan laporan pemesanan tiket kapal ferry.
            </p>

        </div>

    </div>

    <!-- Statistik -->
    <div class="row mb-4">

        <div class="col-lg-4 mb-3">

            <div class="card border-0 shadow-sm h-100"
                 style="border-radius:18px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Pemesanan
                            </small>

                            <h2 class="fw-bold text-primary mt-2">
                                {{ $totalPemesanan }}
                            </h2>

                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-ticket-alt fa-2x text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-3">

            <div class="card border-0 shadow-sm h-100"
                 style="border-radius:18px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Tiket Terjual
                            </small>

                            <h2 class="fw-bold text-success mt-2">
                                {{ $totalTiket }}
                            </h2>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-users fa-2x text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-3">

            <div class="card border-0 shadow-sm h-100"
                 style="border-radius:18px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Pendapatan
                            </small>

                            <h3 class="fw-bold text-warning mt-2">

                                Rp {{ number_format($totalPendapatan,0,',','.') }}

                            </h3>

                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-wallet fa-2x text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Tabel -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-header bg-white border-0 py-3">

            <h4 class="fw-bold mb-0">

                <i class="fas fa-table text-primary me-2"></i>

                Laporan Data Pemesanan

            </h4>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead style="background:#f8fafc;">

                        <tr>

                            <th>No</th>
                            <th>Nama Penumpang</th>
                            <th>Jumlah Tiket</th>
                            <th>Total Harga</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pemesanans as $pemesanan)

                        <tr>

                            <td class="fw-semibold">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <strong>

                                    {{ $pemesanan->nama_penumpang }}

                                </strong>

                            </td>

                            <td>

                                <span class="badge rounded-pill bg-primary px-3 py-2">

                                    {{ $pemesanan->jumlah_tiket }} Tiket

                                </span>

                            </td>

                            <td>

                                <span class="fw-bold text-success">

                                    Rp {{ number_format($pemesanan->total_harga,0,',','.') }}

                                </span>

                            </td>

                            <td>

                                @if($pemesanan->status == 'Lunas')

                                    <span class="badge rounded-pill bg-success px-3 py-2">

                                        <i class="fas fa-circle-check me-1"></i>
                                        Lunas

                                    </span>

                                @elseif($pemesanan->status == 'Menunggu')

                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">

                                        <i class="fas fa-clock me-1"></i>
                                        Menunggu

                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-danger px-3 py-2">

                                        <i class="fas fa-circle-xmark me-1"></i>
                                        Batal

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                <i class="fas fa-chart-bar fa-4x text-secondary mb-3"></i>

                                <h5 class="text-muted">

                                    Belum Ada Data Laporan

                                </h5>

                                <p class="text-secondary">

                                    Data pemesanan akan muncul di sini.

                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection