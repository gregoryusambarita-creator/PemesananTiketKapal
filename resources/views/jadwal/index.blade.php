@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header d-flex justify-content-between align-items-center">

    <h5>
        <i class="fas fa-calendar"></i>
        Data Jadwal
    </h5>

    <a href="{{ route('jadwal.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Tambah Jadwal

    </a>

</div>

<div class="card-body">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead class="table-light">

            <tr>
                <th>No</th>
                <th>Kapal</th>
                <th>Rute</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Stok Tiket</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($jadwals as $jadwal)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ $jadwal->kapal->nama_kapal }}
                </td>

                <td>
                    {{ $jadwal->rute->asal }}
                    -
                    {{ $jadwal->rute->tujuan }}
                </td>

                <td>
                    {{ $jadwal->tanggal_berangkat }}
                </td>

                <td>
                    {{ $jadwal->jam_berangkat }}
                </td>

                <td>
                    {{ $jadwal->stok_tiket }}
                </td>

                <td>

                    <a href="{{ route('jadwal.edit',$jadwal->id) }}"
                       class="btn btn-warning btn-sm">

                        <i class="fas fa-edit"></i>

                    </a>

                    <form action="{{ route('jadwal.destroy',$jadwal->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data?')">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7" class="text-center">
                    Belum ada data jadwal
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>
```

</div>

@endsection
