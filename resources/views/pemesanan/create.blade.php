@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white">
    <h5 class="mb-0">
        Tambah Pemesanan
    </h5>
</div>

<div class="card-body">

    <form action="{{ route('pemesanan.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Jadwal</label>

            <select name="jadwal_id"
                    class="form-control">

                @foreach($jadwals as $jadwal)

                <option value="{{ $jadwal->id }}">

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
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>NIK</label>

            <input type="text"
                   name="nik"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Telepon</label>

            <input type="text"
                   name="telepon"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Jumlah Tiket</label>

            <input type="number"
                   name="jumlah_tiket"
                   class="form-control">
        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan

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