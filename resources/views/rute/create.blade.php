@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header">
    <h5>Tambah Data Rute</h5>
</div>

<div class="card-body">

    <form action="{{ route('rute.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Asal</label>
            <input type="text" name="asal" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tujuan</label>
            <input type="text" name="tujuan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jarak (Km)</label>
            <input type="number" name="jarak" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga Tiket</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="status" class="form-control">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
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