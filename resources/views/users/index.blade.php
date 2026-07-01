@extends('layouts.app')

@section('title','Data Pengguna')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body d-flex justify-content-between align-items-center">

            <div class="text-white">

                <h2 class="fw-bold mb-2">
                    <i class="fas fa-users me-2"></i>
                    Data Pengguna
                </h2>

                <p class="mb-0">
                    Kelola akun pengguna yang dapat mengakses sistem pemesanan tiket kapal.
                </p>

            </div>

            <a href="{{ route('users.create') }}"
               class="btn btn-light btn-lg rounded-pill shadow px-4">

                <i class="fas fa-user-plus me-2 text-primary"></i>
                Tambah User

            </a>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body">

            @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">

                <i class="fas fa-circle-check me-2"></i>
                {{ session('success') }}

                <button class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead style="background:#f8fafc;">

                        <tr>

                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center" width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>

                            <td class="fw-bold">
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $user->name }}
                                </div>

                            </td>

                            <td>

                                <span class="text-secondary">
                                    {{ $user->email }}
                                </span>

                            </td>

                            <td>

                                @if($user->role == 'admin')

                                    <span class="badge rounded-pill bg-danger px-3 py-2">

                                        <i class="fas fa-user-shield me-1"></i>
                                        Admin

                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-primary px-3 py-2">

                                        <i class="fas fa-user me-1"></i>
                                        Petugas

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('users.edit',$user->id) }}"
                                   class="btn btn-warning rounded-circle me-1"
                                   title="Edit">

                                    <i class="fas fa-pen"></i>

                                </a>

                                <form action="{{ route('users.destroy',$user->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger rounded-circle"
                                            title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                <i class="fas fa-users fa-4x text-secondary mb-3"></i>

                                <h5 class="text-muted">

                                    Belum Ada Data Pengguna

                                </h5>

                                <p class="text-secondary">

                                    Silakan tambahkan pengguna pertama.

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
