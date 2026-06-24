@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white d-flex justify-content-between align-items-center">

    <h5 class="mb-0">
        <i class="fas fa-ticket-alt text-primary"></i>
        Data Pemesanan
    </h5>

    <a href="{{ route('pemesanan.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Tambah Pemesanan

    </a>

</div>

<div class="card-body">

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-light">

                <tr>
                    <th>No</th>
                    <th>Penumpang</th>
                    <th>Jadwal</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>

            </thead>

            <tbody>

            @forelse($pemesanans as $pemesanan)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <strong>{{ $pemesanan->nama_penumpang }}</strong>
                    <br>
                    <small>{{ $pemesanan->telepon }}</small>
                </td>

                <td>
                    {{ $pemesanan->jadwal->rute->asal }}
                    -
                    {{ $pemesanan->jadwal->rute->tujuan }}
                </td>

                <td>
                    {{ $pemesanan->jumlah_tiket }}
                </td>

                <td>
                    Rp {{ number_format($pemesanan->total_harga,0,',','.') }}
                </td>

                <td>

                    @if($pemesanan->status == 'Lunas')

                        <span class="badge bg-success">
                            Lunas
                        </span>

                    @elseif($pemesanan->status == 'Batal')

                        <span class="badge bg-danger">
                            Batal
                        </span>

                    @else

                        <span class="badge bg-warning">
                            Menunggu
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('pemesanan.edit',$pemesanan->id) }}"
                       class="btn btn-warning btn-sm">

                        <i class="fas fa-edit"></i>

                    </a>

                    <form action="{{ route('pemesanan.destroy',$pemesanan->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center text-muted py-4">

                    <i class="fas fa-ticket-alt fa-2x mb-2"></i>
                    <br>

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