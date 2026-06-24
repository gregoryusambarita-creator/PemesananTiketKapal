@extends('layouts.app')

@section('content')

<div class="card card-custom">

    <div class="card-header">
        <h5>Edit Data Kapal</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('kapal.update', $kapal->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Kapal</label>
                <input type="text"
                       name="nama_kapal"
                       class="form-control"
                       value="{{ $kapal->nama_kapal }}">
            </div>

            <div class="mb-3">
                <label>Kode Kapal</label>
                <input type="text"
                       name="kode_kapal"
                       class="form-control"
                       value="{{ $kapal->kode_kapal }}">
            </div>

            <div class="mb-3">
                <label>Kapasitas</label>
                <input type="number"
                       name="kapasitas"
                       class="form-control"
                       value="{{ $kapal->kapasitas }}">
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Aktif"
                        {{ $kapal->status == 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="Tidak Aktif"
                        {{ $kapal->status == 'Tidak Aktif' ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-warning">
                Update Data
            </button>

            <a href="{{ route('kapal.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection