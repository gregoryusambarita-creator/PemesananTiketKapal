@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white">
    <h5>Edit Pembayaran</h5>
</div>

<div class="card-body">

    <form action="{{ route('pembayaran.update',$pembayaran->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Pemesanan</label>

            <select name="pemesanan_id"
                    class="form-control">

                @foreach($pemesanans as $pemesanan)

                <option value="{{ $pemesanan->id }}"
                {{ $pembayaran->pemesanan_id == $pemesanan->id ? 'selected' : '' }}>

                    {{ $pemesanan->nama_penumpang }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Bayar</label>

            <input type="date"
                   name="tanggal_bayar"
                   class="form-control"
                   value="{{ $pembayaran->tanggal_bayar }}">

        </div>

        <div class="mb-3">

            <label>Jumlah Bayar</label>

            <input type="number"
                   name="jumlah_bayar"
                   class="form-control"
                   value="{{ $pembayaran->jumlah_bayar }}">

        </div>

        <div class="mb-3">

            <label>Metode Pembayaran</label>

            <select name="metode_pembayaran"
                    class="form-control">

                <option value="Transfer Bank" {{ $pembayaran->metode_pembayaran == 'Transfer Bank' ? 'selected' : '' }}>
                    Transfer Bank
                </option>

                <option value="E-Wallet" {{ $pembayaran->metode_pembayaran == 'E-Wallet' ? 'selected' : '' }}>
                    E-Wallet
                </option>

                <option value="Tunai" {{ $pembayaran->metode_pembayaran == 'Tunai' ? 'selected' : '' }}>
                    Tunai
                </option>

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">

            Update

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
