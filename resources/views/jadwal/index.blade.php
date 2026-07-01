@extends('layouts.app')

@section('title','Data Jadwal')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;
                background:linear-gradient(135deg,#0f172a,#2563eb);">

        <div class="card-body d-flex justify-content-between align-items-center text-white">

            <div>

                <h2 class="fw-bold mb-2">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Data Jadwal Kapal Ferry
                </h2>

                <p class="mb-0">
                    Kelola jadwal keberangkatan kapal ferry Ajibata - Tomok.
                </p>

            </div>

            <a href="{{ route('jadwal.create') }}"
               class="btn btn-light btn-lg rounded-pill px-4 shadow">

                <i class="fas fa-plus-circle me-2"></i>
                Tambah Jadwal

            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm">

            <i class="fas fa-circle-check me-2"></i>

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead style="background:#f8fafc;">

                        <tr class="text-center">

                            <th>No</th>
                            <th>Kapal</th>
                            <th>Rute</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Stok Tiket</th>
                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($jadwals as $jadwal)

                        <tr>

                            <td class="text-center fw-bold">
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <i class="fas fa-ship text-primary me-2"></i>

                                <strong>
                                    {{ $jadwal->kapal->nama_kapal }}
                                </strong>

                            </td>

                            <td>

                                <span class="badge rounded-pill bg-primary">

                                    {{ $jadwal->rute->asal }}

                                </span>

                                <i class="fas fa-arrow-right mx-2 text-secondary"></i>

                                <span class="badge rounded-pill bg-success">

                                    {{ $jadwal->rute->tujuan }}

                                </span>

                            </td>

                            <td>

                                <i class="fas fa-calendar text-primary me-2"></i>

                                {{ date('d M Y', strtotime($jadwal->tanggal_berangkat)) }}

                            </td>

                            <td>

                                <i class="fas fa-clock text-warning me-2"></i>

                                {{ $jadwal->jam_berangkat }}

                            </td>

                            <td>

                                @if($jadwal->stok_tiket > 50)

                                    <span class="badge bg-success rounded-pill px-3">

                                        {{ $jadwal->stok_tiket }} Tiket

                                    </span>

                                @elseif($jadwal->stok_tiket > 20)

                                    <span class="badge bg-warning rounded-pill px-3">

                                        {{ $jadwal->stok_tiket }} Tiket

                                    </span>

                                @else

                                    <span class="badge bg-danger rounded-pill px-3">

                                        {{ $jadwal->stok_tiket }} Tiket

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('jadwal.edit',$jadwal->id) }}"
                                   class="btn btn-warning rounded-circle me-2"
                                   title="Edit">

                                    <i class="fas fa-pen"></i>

                                </a>

                                <form action="{{ route('jadwal.destroy',$jadwal->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger rounded-circle"
                                            title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus jadwal ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                <i class="fas fa-calendar-times fa-4x text-secondary mb-3"></i>

                                <h5 class="text-secondary">

                                    Belum Ada Data Jadwal

                                </h5>

                                <p class="text-muted">

                                    Silakan tambahkan jadwal keberangkatan kapal terlebih dahulu.

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
