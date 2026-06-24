@extends('layouts.app')

@section('content')

<div class="card card-custom">

    <div class="card-header">
        <h5>Tambah Kapal</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('kapal.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama Kapal</label>
                <input type="text"
                       name="nama_kapal"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Kode Kapal</label>
                <input type="text"
                       name="kode_kapal"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Kapasitas</label>
                <input type="number"
                       name="kapasitas"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option>Aktif</option>
                    <option>Tidak Aktif</option>

                </select>
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection