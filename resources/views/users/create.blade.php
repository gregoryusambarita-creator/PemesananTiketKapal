create.blade.php

@extends('layouts.app')

@section('title','Tambah Pengguna')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-user-plus me-2"></i>
                Tambah Pengguna
            </h2>

            <p class="mb-0">
                Tambahkan akun baru untuk mengakses Sistem Pemesanan Tiket Kapal Ferry.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('users.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-user text-primary me-2"></i>
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control form-control-lg"
                               placeholder="Masukkan nama lengkap"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control form-control-lg"
                               placeholder="contoh@email.com"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-lock text-primary me-2"></i>
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control form-control-lg"
                               placeholder="Masukkan password"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-user-shield text-primary me-2"></i>
                            Role Pengguna
                        </label>

                        <select name="role"
                                class="form-select form-select-lg"
                                required>

                            <option value="">-- Pilih Role --</option>
                            <option value="admin">👑 Admin</option>
                            <option value="petugas">👨‍💼 Petugas</option>

                        </select>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">

                    <a href="{{ route('users.index') }}"
                       class="btn btn-light border rounded-pill px-4 me-2">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5">

                        <i class="fas fa-save me-2"></i>
                        Simpan Pengguna

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
