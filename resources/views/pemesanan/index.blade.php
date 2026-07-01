@extends('layouts.app')

@section('title','Data Pemesanan')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body text-white d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold mb-2">
                    <i class="fas fa-ticket-alt me-2"></i>
                    Data Pemesanan Tiket
                </h2>

                <p class="mb-0">
                    Kelola seluruh transaksi pemesanan tiket kapal ferry.
                </p>

            </div>

            <a href="{{ route('pemesanan.create') }}"
               class="btn btn-light rounded-pill px-4 shadow">

                <i class="fas fa-plus-circle me-2 text-primary"></i>
                Tambah Pemesanan

            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm">

            <i class="fas fa-circle-check me-2"></i>

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead style="background:#f8fafc;">

                        <tr class="text-center">

                            <th width="70">No</th>
                            <th>Penumpang</th>
                            <th>Rute</th>
                            <th width="120">Jumlah</th>
                            <th width="170">Total Harga</th>
                            <th width="130">Status</th>
                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pemesanans as $pemesanan)

                        <tr>

                            <td class="text-center fw-bold">
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $pemesanan->nama_penumpang }}
                                </div>

                                <small class="text-muted">

                                    <i class="fas fa-phone me-1"></i>

                                    {{ $pemesanan->telepon }}

                                </small>

                            </td>

                            <td>

                                <span class="badge bg-primary-subtle text-primary border">

                                    {{ $pemesanan->jadwal->rute->asal }}

                                    <i class="fas fa-arrow-right mx-1"></i>

                                    {{ $pemesanan->jadwal->rute->tujuan }}

                                </span>

                            </td>

                            <td class="text-center">

                                <span class="badge bg-info text-dark px-3 py-2">

                                    {{ $pemesanan->jumlah_tiket }} Tiket

                                </span>

                            </td>

                            <td class="fw-bold text-success">

                                Rp {{ number_format($pemesanan->total_harga,0,',','.') }}

                            </td>

                            <td class="text-center">

                                @if($pemesanan->status=='Lunas')

                                    <span class="badge bg-success px-3 py-2">
                                        <i class="fas fa-check-circle me-1"></i>
                                        Lunas
                                    </span>

                                @elseif($pemesanan->status=='Batal')

                                    <span class="badge bg-danger px-3 py-2">
                                        <i class="fas fa-times-circle me-1"></i>
                                        Batal
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        <i class="fas fa-clock me-1"></i>
                                        Menunggu
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('pemesanan.edit',$pemesanan->id) }}"
                                   class="btn btn-warning rounded-circle me-1"
                                   title="Edit">

                                    <i class="fas fa-pen"></i>

                                </a>

                                <form action="{{ route('pemesanan.destroy',$pemesanan->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger rounded-circle"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <i class="fas fa-ticket-alt fa-4x text-secondary mb-3"></i>

                                <h5 class="text-muted">
                                    Belum Ada Data Pemesanan
                                </h5>

                                <p class="text-muted">
                                    Silakan tambahkan data pemesanan terlebih dahulu.
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