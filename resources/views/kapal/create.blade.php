@extends('layouts.app')

@section('title','Tambah Data Kapal')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;
                background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div class="text-white">

                <h2 class="fw-bold mb-2">
                    <i class="fas fa-plus-circle me-2"></i>
                    Tambah Data Kapal
                </h2>

                <p class="mb-0 text-light">
                    Tambahkan kapal baru yang akan digunakan pada sistem pemesanan tiket kapal ferry.
                </p>

            </div>

            <div>

                <a href="{{ route('kapal.index') }}"
                   class="btn btn-light rounded-pill px-4">

                    <i class="fas fa-arrow-left me-2 text-primary"></i>
                    Kembali

                </a>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Terjadi Kesalahan
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('kapal.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <!-- Nama Kapal -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            <i class="fas fa-ship text-primary me-2"></i>
                            Nama Kapal

                        </label>

                        <input
                            type="text"
                            name="nama_kapal"
                            class="form-control form-control-lg"
                            placeholder="Contoh : KMP Tao Toba I"
                            value="{{ old('nama_kapal') }}"
                            required>

                    </div>

                    <!-- Kode Kapal -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            <i class="fas fa-barcode text-primary me-2"></i>
                            Kode Kapal

                        </label>

                        <input
                            type="text"
                            name="kode_kapal"
                            class="form-control form-control-lg"
                            placeholder="Contoh : KMP001"
                            value="{{ old('kode_kapal') }}"
                            required>

                    </div>

                    <!-- Kapasitas -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            <i class="fas fa-users text-primary me-2"></i>
                            Kapasitas Penumpang

                        </label>

                        <input
                            type="number"
                            name="kapasitas"
                            class="form-control form-control-lg"
                            placeholder="Masukkan kapasitas"
                            value="{{ old('kapasitas') }}"
                            required>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            <i class="fas fa-toggle-on text-primary me-2"></i>
                            Status Kapal

                        </label>

                        <select
                            name="status"
                            class="form-select form-select-lg">

                            <option value="Aktif"
                                {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Tidak Aktif"
                                {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>

                        </select>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-3">

                    <a href="{{ route('kapal.index') }}"
                       class="btn btn-secondary btn-lg rounded-pill px-4">

                        <i class="fas fa-times me-2"></i>
                        Batal

                    </a>

                    <button
                        type="reset"
                        class="btn btn-outline-secondary btn-lg rounded-pill px-4">

                        <i class="fas fa-rotate-left me-2"></i>
                        Reset

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary btn-lg rounded-pill px-5 shadow">

                        <i class="fas fa-save me-2"></i>
                        Simpan Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection