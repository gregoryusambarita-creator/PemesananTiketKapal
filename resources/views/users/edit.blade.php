@extends('layouts.app')

@section('content')

<div class="card">

```
<div class="card-header">
    <h5>Edit Pengguna</h5>
</div>

<div class="card-body">

    <form action="{{ route('users.update',$user->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>

            <input type="text"
                   name="name"
                   value="{{ $user->name }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Email</label>

            <input type="email"
                   name="email"
                   value="{{ $user->email }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Role</label>

            <select name="role"
                    class="form-control">

                <option value="admin"
                    {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="petugas"
                    {{ $user->role == 'petugas' ? 'selected' : '' }}>
                    Petugas
                </option>

            </select>
        </div>

        <button class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('users.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
```

</div>

@endsection
