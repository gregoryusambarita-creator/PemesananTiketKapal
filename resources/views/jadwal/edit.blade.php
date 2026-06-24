@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header">
    <h5>Edit Jadwal</h5>
</div>

<div class="card-body">

    <form action="{{ route('jadwal.update',$jadwal->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Kapal</label>

            <select name="kapal_id"
                    class="form-control">

                @foreach($kapals as $kapal)

                <option value="{{ $kapal->id }}"
                {{ $jadwal->kapal_id == $kapal->id ? 'selected' : '' }}>

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

                <option value="{{ $rute->id }}"
                {{ $jadwal->rute_id == $rute->id ? 'selected' : '' }}>

                    {{ $rute->asal }}
                    -
                    {{ $rute->tujuan }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Berangkat</label>

            <input type="date"
                   name="tanggal_berangkat"
                   class="form-control"
                   value="{{ $jadwal->tanggal_berangkat }}">

        </div>

        <div class="mb-3">

            <label>Jam Berangkat</label>

            <input type="time"
                   name="jam_berangkat"
                   class="form-control"
                   value="{{ $jadwal->jam_berangkat }}">

        </div>

        <div class="mb-3">

            <label>Stok Tiket</label>

            <input type="number"
                   name="stok_tiket"
                   class="form-control"
                   value="{{ $jadwal->stok_tiket }}">

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
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
