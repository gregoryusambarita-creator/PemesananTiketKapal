@extends('layouts.app')

@section('title','Tambah Rute')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;
                background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Rute
            </h2>

            <p class="mb-0">
                Tambahkan rute baru yang akan digunakan pada sistem pemesanan tiket kapal ferry.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('rute.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-location-dot text-primary me-2"></i>
                            Pelabuhan Asal
                        </label>

                        <input type="text"
                               name="asal"
                               class="form-control form-control-lg"
                               placeholder="Contoh : Ajibata"
                               value="{{ old('asal') }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-flag-checkered text-success me-2"></i>
                            Pelabuhan Tujuan
                        </label>

                        <input type="text"
                               name="tujuan"
                               class="form-control form-control-lg"
                               placeholder="Contoh : Tomok"
                               value="{{ old('tujuan') }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-road text-warning me-2"></i>
                            Jarak (Km)
                        </label>

                        <input type="number"
                               name="jarak"
                               class="form-control form-control-lg"
                               placeholder="Masukkan jarak"
                               value="{{ old('jarak') }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-money-bill-wave text-success me-2"></i>
                            Harga Tiket
                        </label>

                        <input type="number"
                               name="harga"
                               class="form-control form-control-lg"
                               placeholder="Masukkan harga tiket"
                               value="{{ old('harga') }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-circle-check text-primary me-2"></i>
                            Status
                        </label>

                        <select name="status"
                                class="form-select form-select-lg">

                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>

                        </select>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">

                    <a href="{{ route('rute.index') }}"
                       class="btn btn-light border rounded-pill px-4 me-2">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5">

                        <i class="fas fa-save me-2"></i>
                        Simpan Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection