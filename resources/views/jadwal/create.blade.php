@extends('layouts.app')

@section('title','Tambah Jadwal')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;
                background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-calendar-plus me-2"></i>
                Tambah Jadwal Keberangkatan
            </h2>

            <p class="mb-0">
                Tambahkan jadwal baru untuk keberangkatan kapal ferry.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('jadwal.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-ship text-primary me-2"></i>
                            Kapal
                        </label>

                        <select name="kapal_id"
                                class="form-select form-select-lg"
                                required>

                            <option value="">-- Pilih Kapal --</option>

                            @foreach($kapals as $kapal)

                                <option value="{{ $kapal->id }}">
                                    {{ $kapal->nama_kapal }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-route text-success me-2"></i>
                            Rute
                        </label>

                        <select name="rute_id"
                                class="form-select form-select-lg"
                                required>

                            <option value="">-- Pilih Rute --</option>

                            @foreach($rutes as $rute)

                                <option value="{{ $rute->id }}">
                                    {{ $rute->asal }} - {{ $rute->tujuan }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-calendar-day text-primary me-2"></i>
                            Tanggal Berangkat
                        </label>

                        <input type="date"
                               name="tanggal_berangkat"
                               class="form-control form-control-lg"
                               value="{{ old('tanggal_berangkat') }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-clock text-warning me-2"></i>
                            Jam Berangkat
                        </label>

                        <input type="time"
                               name="jam_berangkat"
                               class="form-control form-control-lg"
                               value="{{ old('jam_berangkat') }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-ticket-alt text-danger me-2"></i>
                            Stok Tiket
                        </label>

                        <input type="number"
                               name="stok_tiket"
                               class="form-control form-control-lg"
                               placeholder="Masukkan jumlah tiket"
                               value="{{ old('stok_tiket') }}"
                               required>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">

                    <a href="{{ route('jadwal.index') }}"
                       class="btn btn-light border rounded-pill px-4 me-2">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5">

                        <i class="fas fa-save me-2"></i>
                        Simpan Jadwal

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
