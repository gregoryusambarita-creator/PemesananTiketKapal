@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header">
    <h5>Edit Data Rute</h5>
</div>

<div class="card-body">

    <form action="{{ route('rute.update',$rute->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Asal</label>
            <input type="text"
                   name="asal"
                   class="form-control"
                   value="{{ $rute->asal }}">
        </div>

        <div class="mb-3">
            <label>Tujuan</label>
            <input type="text"
                   name="tujuan"
                   class="form-control"
                   value="{{ $rute->tujuan }}">
        </div>

        <div class="mb-3">
            <label>Jarak (Km)</label>
            <input type="number"
                   name="jarak"
                   class="form-control"
                   value="{{ $rute->jarak }}">
        </div>

        <div class="mb-3">
            <label>Harga Tiket</label>
            <input type="number"
                   name="harga"
                   class="form-control"
                   value="{{ $rute->harga }}">
        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option value="Aktif"
                    {{ $rute->status == 'Aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="Tidak Aktif"
                    {{ $rute->status == 'Tidak Aktif' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('rute.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
```

</div>

@endsection