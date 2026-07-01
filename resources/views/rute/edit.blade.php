@extends('layouts.app')

@section('title','Edit Data Rute')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;
                background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-pen-to-square me-2"></i>
                Edit Data Rute
            </h2>

            <p class="mb-0">
                Perbarui informasi rute kapal ferry pada sistem pemesanan tiket.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('rute.update',$rute->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-location-dot text-primary me-2"></i>
                            Pelabuhan Asal
                        </label>

                        <input type="text"
                               name="asal"
                               class="form-control form-control-lg"
                               value="{{ old('asal',$rute->asal) }}"
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
                               value="{{ old('tujuan',$rute->tujuan) }}"
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
                               value="{{ old('jarak',$rute->jarak) }}"
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
                               value="{{ old('harga',$rute->harga) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-circle-check text-primary me-2"></i>
                            Status
                        </label>

                        <select name="status"
                                class="form-select form-select-lg">

                            <option value="Aktif"
                                {{ $rute->status == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Tidak Aktif"
                                {{ $rute->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>

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
                            class="btn btn-warning rounded-pill px-5 text-white">

                        <i class="fas fa-pen me-2"></i>
                        Update Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection