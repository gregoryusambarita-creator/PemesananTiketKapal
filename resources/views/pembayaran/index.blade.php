@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white d-flex justify-content-between align-items-center">

    <h5 class="mb-0">
        <i class="fas fa-money-bill-wave text-primary"></i>
        Data Pembayaran
    </h5>

    <a href="{{ route('pembayaran.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Tambah Pembayaran

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
                    <th>Pemesan</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Metode</th>
                    <th width="180">Aksi</th>
                </tr>

            </thead>

            <tbody>

            @forelse($pembayarans as $pembayaran)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ $pembayaran->pemesanan->nama_penumpang }}
                </td>

                <td>
                    {{ $pembayaran->tanggal_bayar }}
                </td>

                <td>
                    Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}
                </td>

                <td>
                    {{ $pembayaran->metode_pembayaran }}
                </td>

                <td>

                    <a href="{{ route('pembayaran.edit',$pembayaran->id) }}"
                       class="btn btn-warning btn-sm">

                        <i class="fas fa-edit"></i>

                    </a>

                    <form action="{{ route('pembayaran.destroy',$pembayaran->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data?')">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada data pembayaran

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
