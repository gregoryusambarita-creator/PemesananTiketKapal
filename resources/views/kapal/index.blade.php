@extends('layouts.app')

@section('content')

<div class="card card-custom">

```
<div class="card-header bg-white d-flex justify-content-between align-items-center">
    <h5 class="mb-0">
        <i class="fas fa-ship text-primary"></i>
        Data Kapal
    </h5>

    <a href="{{ route('kapal.create') }}"
       class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Tambah Kapal
    </a>
</div>

<div class="card-body">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-light">

                <tr>
                    <th>No</th>
                    <th>Nama Kapal</th>
                    <th>Kode Kapal</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($kapals as $kapal)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $kapal->nama_kapal }}</strong>
                    </td>

                    <td>
                        <span class="badge bg-secondary">
                            {{ $kapal->kode_kapal }}
                        </span>
                    </td>

                    <td>
                        {{ number_format($kapal->kapasitas) }} Penumpang
                    </td>

                    <td>

                        @if($kapal->status == 'Aktif')

                            <span class="badge bg-success">
                                Aktif
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Tidak Aktif
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('kapal.edit',$kapal->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form action="{{ route('kapal.destroy',$kapal->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data kapal ini?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center text-muted py-4">

                        <i class="fas fa-ship fa-2x mb-2"></i>
                        <br>

                        Belum ada data kapal

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</div>

@endsection