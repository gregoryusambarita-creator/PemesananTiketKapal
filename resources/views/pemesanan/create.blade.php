@extends('layouts.app')

@section('title','Tambah Pemesanan')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-ticket-alt me-2"></i>
                Tambah Pemesanan Tiket
            </h2>

            <p class="mb-0">
                Masukkan data pemesanan penumpang kapal ferry.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('pemesanan.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-calendar-days text-primary me-2"></i>
                            Jadwal Keberangkatan
                        </label>

                        <select name="jadwal_id"
                                class="form-select form-select-lg"
                                required>

                            @foreach($jadwals as $jadwal)

                            <option value="{{ $jadwal->id }}">

                                {{ $jadwal->kapal->nama_kapal }}
                                |
                                {{ $jadwal->rute->asal }}
                                →
                                {{ $jadwal->rute->tujuan }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-user text-primary me-2"></i>
                            Nama Penumpang
                        </label>

                        <input type="text"
                               name="nama_penumpang"
                               class="form-control form-control-lg"
                               placeholder="Masukkan nama penumpang"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-id-card text-success me-2"></i>
                            NIK
                        </label>

                        <input type="text"
                               name="nik"
                               class="form-control form-control-lg"
                               placeholder="Masukkan NIK"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-phone text-warning me-2"></i>
                            Nomor Telepon
                        </label>

                        <input type="text"
                               name="telepon"
                               class="form-control form-control-lg"
                               placeholder="08xxxxxxxxxx"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-ticket text-danger me-2"></i>
                            Jumlah Tiket
                        </label>

                        <input type="number"
                               name="jumlah_tiket"
                               class="form-control form-control-lg"
                               min="1"
                               placeholder="Jumlah tiket"
                               required>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">

                    <a href="{{ route('pemesanan.index') }}"
                       class="btn btn-light border rounded-pill px-4 me-2">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5">

                        <i class="fas fa-save me-2"></i>
                        Simpan Pemesanan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
