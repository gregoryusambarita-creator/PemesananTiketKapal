@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white">
    <h5 class="mb-0">
        Edit Pemesanan
    </h5>
</div>

<div class="card-body">

    <form action="{{ route('pemesanan.update',$pemesanan->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Jadwal</label>

            <select name="jadwal_id"
                    class="form-control">

                @foreach($jadwals as $jadwal)

                <option value="{{ $jadwal->id }}"
                {{ $pemesanan->jadwal_id == $jadwal->id ? 'selected' : '' }}>

                    {{ $jadwal->kapal->nama_kapal }}
                    |
                    {{ $jadwal->rute->asal }}
                    -
                    {{ $jadwal->rute->tujuan }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Nama Penumpang</label>

            <input type="text"
                   name="nama_penumpang"
                   class="form-control"
                   value="{{ $pemesanan->nama_penumpang }}">

        </div>

        <div class="mb-3">

            <label>NIK</label>

            <input type="text"
                   name="nik"
                   class="form-control"
                   value="{{ $pemesanan->nik }}">

        </div>

        <div class="mb-3">

            <label>Telepon</label>

            <input type="text"
                   name="telepon"
                   class="form-control"
                   value="{{ $pemesanan->telepon }}">

        </div>

        <div class="mb-3">

            <label>Jumlah Tiket</label>

            <input type="number"
                   name="jumlah_tiket"
                   class="form-control"
                   value="{{ $pemesanan->jumlah_tiket }}">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option value="Menunggu" {{ $pemesanan->status == 'Menunggu' ? 'selected' : '' }}>
                    Menunggu
                </option>

                <option value="Lunas" {{ $pemesanan->status == 'Lunas' ? 'selected' : '' }}>
                    Lunas
                </option>

                <option value="Batal" {{ $pemesanan->status == 'Batal' ? 'selected' : '' }}>
                    Batal
                </option>

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">

            Update

        </button>

        <a href="{{ route('pemesanan.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>
```

</div>

@endsection