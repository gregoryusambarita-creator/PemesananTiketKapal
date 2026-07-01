@extends('layouts.app')

@section('title','Tambah Pembayaran')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-money-bill-wave me-2"></i>
                Tambah Pembayaran
            </h2>

            <p class="mb-0">
                Masukkan data pembayaran tiket kapal ferry.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('pembayaran.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-ticket-alt text-primary me-2"></i>
                            Pilih Pemesanan
                        </label>

                        <select name="pemesanan_id"
                                class="form-select form-select-lg"
                                required>

                            @foreach($pemesanans as $pemesanan)

                            <option value="{{ $pemesanan->id }}">

                                {{ $pemesanan->nama_penumpang }}
                                |
                                Rp {{ number_format($pemesanan->total_harga,0,',','.') }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-calendar-alt text-success me-2"></i>
                            Tanggal Bayar
                        </label>

                        <input type="date"
                               name="tanggal_bayar"
                               class="form-control form-control-lg"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-wallet text-warning me-2"></i>
                            Jumlah Bayar
                        </label>

                        <input type="number"
                               name="jumlah_bayar"
                               class="form-control form-control-lg"
                               placeholder="Masukkan nominal pembayaran"
                               required>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-credit-card text-danger me-2"></i>
                            Metode Pembayaran
                        </label>

                        <select name="metode_pembayaran"
                                class="form-select form-select-lg">

                            <option value="Transfer Bank">
                                🏦 Transfer Bank
                            </option>

                            <option value="E-Wallet">
                                📱 E-Wallet
                            </option>

                            <option value="Tunai">
                                💵 Tunai
                            </option>

                        </select>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">

                    <a href="{{ route('pembayaran.index') }}"
                       class="btn btn-light border rounded-pill px-4 me-2">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5">

                        <i class="fas fa-save me-2"></i>
                        Simpan Pembayaran

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


edit.blade.php

@extends('layouts.app')

@section('title','Edit Pembayaran')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-pen-to-square me-2"></i>
                Edit Pembayaran
            </h2>

            <p class="mb-0">
                Perbarui informasi pembayaran tiket kapal ferry.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('pembayaran.update',$pembayaran->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-ticket-alt text-primary me-2"></i>
                            Pilih Pemesanan
                        </label>

                        <select name="pemesanan_id"
                                class="form-select form-select-lg"
                                required>

                            @foreach($pemesanans as $pemesanan)

                            <option value="{{ $pemesanan->id }}"
                                {{ $pembayaran->pemesanan_id == $pemesanan->id ? 'selected' : '' }}>

                                {{ $pemesanan->nama_penumpang }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-calendar-alt text-success me-2"></i>
                            Tanggal Bayar
                        </label>

                        <input type="date"
                               name="tanggal_bayar"
                               class="form-control form-control-lg"
                               value="{{ $pembayaran->tanggal_bayar }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-wallet text-warning me-2"></i>
                            Jumlah Bayar
                        </label>

                        <input type="number"
                               name="jumlah_bayar"
                               class="form-control form-control-lg"
                               value="{{ $pembayaran->jumlah_bayar }}"
                               required>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-credit-card text-danger me-2"></i>
                            Metode Pembayaran
                        </label>

                        <select name="metode_pembayaran"
                                class="form-select form-select-lg">

                            <option value="Transfer Bank"
                                {{ $pembayaran->metode_pembayaran == 'Transfer Bank' ? 'selected' : '' }}>
                                🏦 Transfer Bank
                            </option>

                            <option value="E-Wallet"
                                {{ $pembayaran->metode_pembayaran == 'E-Wallet' ? 'selected' : '' }}>
                                📱 E-Wallet
                            </option>

                            <option value="Tunai"
                                {{ $pembayaran->metode_pembayaran == 'Tunai' ? 'selected' : '' }}>
                                💵 Tunai
                            </option>

                        </select>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">

                    <a href="{{ route('pembayaran.index') }}"
                       class="btn btn-light border rounded-pill px-4 me-2">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-warning rounded-pill px-5">

                        <i class="fas fa-save me-2"></i>
                        Update Pembayaran

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
