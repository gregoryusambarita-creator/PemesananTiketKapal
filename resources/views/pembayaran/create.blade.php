@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white">
    <h5>Tambah Pembayaran</h5>
</div>

<div class="card-body">

    <form action="{{ route('pembayaran.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Pemesanan</label>

            <select name="pemesanan_id"
                    class="form-control">

                @foreach($pemesanans as $pemesanan)

                <option value="{{ $pemesanan->id }}">

                    {{ $pemesanan->nama_penumpang }}
                    -
                    Rp {{ number_format($pemesanan->total_harga,0,',','.') }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Bayar</label>

            <input type="date"
                   name="tanggal_bayar"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Jumlah Bayar</label>

            <input type="number"
                   name="jumlah_bayar"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Metode Pembayaran</label>

            <select name="metode_pembayaran"
                    class="form-control">

                <option value="Transfer Bank">
                    Transfer Bank
                </option>

                <option value="E-Wallet">
                    E-Wallet
                </option>

                <option value="Tunai">
                    Tunai
                </option>

            </select>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan

        </button>

        <a href="{{ route('pembayaran.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>
```

</div>

@endsection
