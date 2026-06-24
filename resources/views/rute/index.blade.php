@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white d-flex justify-content-between align-items-center">

    <h5 class="mb-0">
        <i class="fas fa-route text-primary"></i>
        Data Rute
    </h5>

    <a href="{{ route('rute.create') }}"
       class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Tambah Rute
    </a>

</div>

<div class="card-body">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover">

        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Jarak</th>
                <th>Harga</th>
                <th>Status</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($rutes as $rute)

            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $rute->asal }}</td>
                <td>{{ $rute->tujuan }}</td>
                <td>{{ $rute->jarak }} Km</td>
                <td>Rp {{ number_format($rute->harga,0,',','.') }}</td>

                <td>
                    @if($rute->status == 'Aktif')
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>

                <td>

                    <a href="{{ route('rute.edit',$rute->id) }}"
                       class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('rute.destroy',$rute->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" class="text-center">
                    Belum ada data rute
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>
```

</div>

@endsection