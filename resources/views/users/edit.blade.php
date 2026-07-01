@extends('layouts.app')

@section('title','Edit Pengguna')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white">

            <h2 class="fw-bold mb-2">
                <i class="fas fa-user-pen me-2"></i>
                Edit Pengguna
            </h2>

            <p class="mb-0">
                Perbarui informasi akun pengguna Sistem Pemesanan Tiket Kapal Ferry.
            </p>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('users.update',$user->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-user text-primary me-2"></i>
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="form-control form-control-lg"
                               required>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ $user->email }}"
                               class="form-control form-control-lg"
                               required>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold">
                            <i class="fas fa-user-shield text-primary me-2"></i>
                            Role Pengguna
                        </label>

                        <select name="role"
                                class="form-select form-select-lg">

                            <option value="admin"
                                {{ $user->role == 'admin' ? 'selected' : '' }}>
                                👑 Admin
                            </option>

                            <option value="petugas"
                                {{ $user->role == 'petugas' ? 'selected' : '' }}>
                                👨‍💼 Petugas
                            </option>

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
                            class="btn btn-warning rounded-pill px-5">

                        <i class="fas fa-save me-2"></i>
                        Update Pengguna

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection