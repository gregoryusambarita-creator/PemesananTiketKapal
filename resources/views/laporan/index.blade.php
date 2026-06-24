@extends('layouts.app')

@section('content')

<div class="row mb-4">

```
<div class="col-md-4">
    <div class="card card-custom">
        <div class="card-body">
            <h6>Total Pemesanan</h6>
            <h2>{{ $totalPemesanan }}</h2>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-custom">
        <div class="card-body">
            <h6>Total Tiket Terjual</h6>
            <h2>{{ $totalTiket }}</h2>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-custom">
        <div class="card-body">
            <h6>Total Pendapatan</h6>
            <h4>
                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
            </h4>
        </div>
    </div>
</div>
```

</div>

<div class="card card-custom">

```
<div class="card-header bg-white">
    <h5>
        <i class="fas fa-chart-bar text-primary"></i>
        Laporan Pemesanan
    </h5>
</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-hover">

            <thead class="table-light">

                <tr>
                    <th>No</th>
                    <th>Nama Penumpang</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @forelse($pemesanans as $pemesanan)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $pemesanan->nama_penumpang }}</td>

                    <td>{{ $pemesanan->jumlah_tiket }}</td>

                    <td>
                        Rp {{ number_format($pemesanan->total_harga,0,',','.') }}
                    </td>

                    <td>

                        @if($pemesanan->status == 'Lunas')
                            <span class="badge bg-success">
                                Lunas
                            </span>

                        @elseif($pemesanan->status == 'Menunggu')
                            <span class="badge bg-warning text-dark">
                                Menunggu
                            </span>

                        @else
                            <span class="badge bg-danger">
                                Batal
                            </span>
                        @endif

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center">
                        Belum ada data pemesanan
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</div>

@endsection