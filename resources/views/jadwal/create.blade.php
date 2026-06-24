@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header">
    <h5>Tambah Jadwal</h5>
</div>

<div class="card-body">

    <form action="{{ route('jadwal.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Kapal</label>

            <select name="kapal_id"
                    class="form-control">

                @foreach($kapals as $kapal)

                    <option value="{{ $kapal->id }}">
                        {{ $kapal->nama_kapal }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Rute</label>

            <select name="rute_id"
                    class="form-control">

                @foreach($rutes as $rute)

                    <option value="{{ $rute->id }}">
                        {{ $rute->asal }} -
                        {{ $rute->tujuan }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label>Tanggal Berangkat</label>
            <input type="date"
                   name="tanggal_berangkat"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Jam Berangkat</label>
            <input type="time"
                   name="jam_berangkat"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok Tiket</label>
            <input type="number"
                   name="stok_tiket"
                   class="form-control">
        </div>

        <button type="submit"
                class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('jadwal.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
```

</div>

@endsection
