@extends('layouts.app')

@section('title','Data Pembayaran')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body d-flex justify-content-between align-items-center">

            <div class="text-white">

                <h2 class="fw-bold mb-2">
                    <i class="fas fa-money-bill-wave me-2"></i>
                    Data Pembayaran
                </h2>

                <p class="mb-0">
                    Kelola seluruh transaksi pembayaran tiket kapal ferry.
                </p>

            </div>

            <a href="{{ route('pembayaran.create') }}"
               class="btn btn-light btn-lg rounded-pill px-4 shadow">

                <i class="fas fa-plus-circle me-2 text-primary"></i>
                Tambah Pembayaran

            </a>

        </div>

    </div>

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">

        <i class="fas fa-circle-check me-2"></i>
        {{ session('success') }}

        <button class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    <!-- Table -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead style="background:#f8fafc;">

                        <tr>

                            <th>No</th>
                            <th>Penumpang</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                            <th>Metode</th>
                            <th class="text-center" width="170">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pembayarans as $pembayaran)

                        <tr>

                            <td class="fw-semibold">
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $pembayaran->pemesanan->nama_penumpang }}
                                </div>

                            </td>

                            <td>

                                <span class="badge rounded-pill bg-primary">

                                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y') }}

                                </span>

                            </td>

                            <td>

                                <span class="fw-bold text-success">

                                    Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}

                                </span>

                            </td>

                            <td>

                                @if($pembayaran->metode_pembayaran == 'Transfer')

                                    <span class="badge rounded-pill bg-primary px-3 py-2">
                                        <i class="fas fa-building-columns me-1"></i>
                                        Transfer
                                    </span>

                                @elseif($pembayaran->metode_pembayaran == 'Cash')

                                    <span class="badge rounded-pill bg-success px-3 py-2">
                                        <i class="fas fa-money-bill me-1"></i>
                                        Cash
                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">

                                        {{ $pembayaran->metode_pembayaran }}

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('pembayaran.edit',$pembayaran->id) }}"
                                   class="btn btn-warning rounded-circle me-1"
                                   title="Edit">

                                    <i class="fas fa-pen"></i>

                                </a>

                                <form action="{{ route('pembayaran.destroy',$pembayaran->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger rounded-circle"
                                            onclick="return confirm('Yakin ingin menghapus pembayaran ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                <i class="fas fa-money-bill-wave fa-4x text-secondary mb-3"></i>

                                <h5 class="text-muted">

                                    Belum Ada Data Pembayaran

                                </h5>

                                <p class="text-secondary">

                                    Silakan tambahkan pembayaran pertama.

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
