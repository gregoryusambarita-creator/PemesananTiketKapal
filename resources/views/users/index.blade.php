@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Pengguna</h5>

```
    <a href="{{ route('users.create') }}"
       class="btn btn-primary">
        Tambah User
    </a>
</div>

<div class="card-body">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>

                <td>
                    <a href="{{ route('users.edit',$user->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('users.destroy',$user->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>
```

</div>

@endsection
