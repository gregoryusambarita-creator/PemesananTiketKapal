@extends('layouts.app')

@section('title','Data Kapal')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;
                background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div class="text-white">

                <h2 class="fw-bold mb-2">
                    <i class="fas fa-ship me-2"></i>
                    Data Kapal Ferry
                </h2>

                <p class="mb-0 text-light">
                    Kelola seluruh data kapal yang digunakan pada Sistem Pemesanan Tiket Kapal Ferry.
                </p>

            </div>

            <div>

                <a href="{{ route('kapal.create') }}"
                   class="btn btn-light btn-lg rounded-pill shadow">

                    <i class="fas fa-plus-circle me-2 text-primary"></i>
                    Tambah Kapal

                </a>

            </div>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm">

            <i class="fas fa-check-circle me-2"></i>

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <!-- Table -->
    <div class="card border-0 shadow-sm" style="border-radius:20px;">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">

                    <i class="fas fa-list text-primary me-2"></i>

                    Daftar Kapal

                </h5>

                <span class="badge bg-primary fs-6">

                    Total :
                    {{ $kapals->count() }}

                </span>

            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead style="background:#0f172a;color:white;">

                        <tr>

                            <th class="text-center">No</th>

                            <th>Nama Kapal</th>

                            <th>Kode Kapal</th>

                            <th class="text-center">Kapasitas</th>

                            <th class="text-center">Status</th>

                            <th class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($kapals as $kapal)

                        <tr>

                            <td class="text-center fw-bold">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-3"
                                         style="width:45px;height:45px;">

                                        <i class="fas fa-ship"></i>

                                    </div>

                                    <div>

                                        <div class="fw-bold">

                                            {{ $kapal->nama_kapal }}

                                        </div>

                                        <small class="text-muted">
                                            Ferry Penumpang
                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="badge rounded-pill bg-secondary fs-6">

                                    {{ $kapal->kode_kapal }}

                                </span>

                            </td>

                            <td class="text-center">

                                <span class="fw-bold text-primary">

                                    {{ number_format($kapal->kapasitas) }}

                                </span>

                                <br>

                                <small class="text-muted">

                                    Penumpang

                                </small>

                            </td>

                            <td class="text-center">

                                @if($kapal->status == 'Aktif')

                                    <span class="badge rounded-pill bg-success px-3 py-2">

                                        <i class="fas fa-circle me-1"></i>

                                        Aktif

                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-danger px-3 py-2">

                                        <i class="fas fa-circle me-1"></i>

                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('kapal.edit',$kapal->id) }}"
                                   class="btn btn-warning rounded-circle me-2"
                                   title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('kapal.destroy',$kapal->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger rounded-circle"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus data kapal ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="text-center py-5">

                                    <i class="fas fa-ship fa-4x text-secondary mb-3"></i>

                                    <h4 class="fw-bold">

                                        Belum Ada Data Kapal

                                    </h4>

                                    <p class="text-muted">

                                        Silakan tambahkan data kapal terlebih dahulu.

                                    </p>

                                    <a href="{{ route('kapal.create') }}"
                                       class="btn btn-primary rounded-pill px-4">

                                        <i class="fas fa-plus me-2"></i>

                                        Tambah Kapal

                                    </a>

                                </div>

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