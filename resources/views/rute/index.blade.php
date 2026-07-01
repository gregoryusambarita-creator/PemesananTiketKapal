@extends('layouts.app')

@section('title','Data Rute')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;
                background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div class="text-white">

                <h2 class="fw-bold mb-2">
                    <i class="fas fa-route me-2"></i>
                    Data Rute Ferry
                </h2>

                <p class="mb-0 text-light">
                    Kelola seluruh rute perjalanan kapal ferry pada sistem pemesanan tiket.
                </p>

            </div>

            <div>

                <a href="{{ route('rute.create') }}"
                   class="btn btn-light rounded-pill px-4 shadow">

                    <i class="fas fa-plus-circle text-primary me-2"></i>
                    Tambah Rute

                </a>

            </div>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="fas fa-circle-check me-2"></i>
                    {{ session('success') }}

                    <button class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead style="background:#f8fafc;">

                        <tr>

                            <th width="70">No</th>

                            <th>
                                <i class="fas fa-location-dot text-primary me-1"></i>
                                Asal
                            </th>

                            <th>
                                <i class="fas fa-flag-checkered text-success me-1"></i>
                                Tujuan
                            </th>

                            <th width="130">
                                <i class="fas fa-road text-warning me-1"></i>
                                Jarak
                            </th>

                            <th width="170">
                                <i class="fas fa-money-bill-wave text-success me-1"></i>
                                Harga Tiket
                            </th>

                            <th width="120">
                                Status
                            </th>

                            <th width="170" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($rutes as $rute)

                        <tr>

                            <td>

                                <span class="fw-bold text-primary">
                                    {{ $loop->iteration }}
                                </span>

                            </td>

                            <td>

                                <strong>
                                    {{ $rute->asal }}
                                </strong>

                            </td>

                            <td>

                                <strong class="text-success">
                                    {{ $rute->tujuan }}
                                </strong>

                            </td>

                            <td>

                                <span class="badge bg-primary rounded-pill px-3 py-2">

                                    {{ $rute->jarak }} Km

                                </span>

                            </td>

                            <td>

                                <span class="fw-bold text-success">

                                    Rp {{ number_format($rute->harga,0,',','.') }}

                                </span>

                            </td>

                            <td>

                                @if($rute->status=='Aktif')

                                    <span class="badge rounded-pill bg-success px-3">

                                        <i class="fas fa-circle me-1"></i>
                                        Aktif

                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-danger px-3">

                                        <i class="fas fa-circle me-1"></i>
                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('rute.edit',$rute->id) }}"
                                   class="btn btn-warning rounded-circle me-1"
                                   title="Edit">

                                    <i class="fas fa-pen"></i>

                                </a>

                                <form action="{{ route('rute.destroy',$rute->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger rounded-circle"
                                        onclick="return confirm('Yakin ingin menghapus data rute ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7">

                                <div class="text-center py-5">

                                    <i class="fas fa-route fa-4x text-secondary mb-3"></i>

                                    <h5 class="fw-bold">
                                        Belum Ada Data Rute
                                    </h5>

                                    <p class="text-muted">

                                        Silakan tambahkan data rute terlebih dahulu.

                                    </p>

                                    <a href="{{ route('rute.create') }}"
                                       class="btn btn-primary rounded-pill px-4">

                                        <i class="fas fa-plus-circle me-2"></i>

                                        Tambah Rute

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
