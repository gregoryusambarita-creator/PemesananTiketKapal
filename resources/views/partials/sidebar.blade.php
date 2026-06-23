<div class="sidebar">

```
<!-- Logo -->
<div class="text-center mb-4">

    <div style="
        width:70px;
        height:70px;
        background:linear-gradient(135deg,#2563eb,#60a5fa);
        border-radius:20px;
        margin:auto;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:30px;
        color:white;
        box-shadow:0 8px 20px rgba(37,99,235,.35);
    ">
        <i class="fas fa-ship"></i>
    </div>

    <h4 class="mt-3 mb-0 text-white fw-bold">
        Ferry Ticket
    </h4>

    <small class="text-secondary">
        Ajibata - Tomok
    </small>

</div>

<hr style="border-color:rgba(255,255,255,.1)">

<small class="text-uppercase text-secondary px-2">
    Menu Utama
</small>

<a href="{{ url('/') }}"
   class="{{ request()->is('/') ? 'active-menu' : '' }}">
    <i class="fas fa-chart-pie"></i>
    Dashboard
</a>

@if(Auth::user()->role == 'admin')

<a href="{{ route('kapal.index') }}"
   class="{{ request()->is('kapal*') ? 'active-menu' : '' }}">
    <i class="fas fa-ship"></i>
    Data Kapal
</a>

<a href="{{ route('rute.index') }}"
   class="{{ request()->is('rute*') ? 'active-menu' : '' }}">
    <i class="fas fa-route"></i>
    Data Rute
</a>

@endif

<a href="{{ route('jadwal.index') }}"
   class="{{ request()->is('jadwal*') ? 'active-menu' : '' }}">
    <i class="fas fa-calendar-alt"></i>
    Jadwal Kapal
</a>

<a href="{{ route('pemesanan.index') }}"
   class="{{ request()->is('pemesanan*') ? 'active-menu' : '' }}">
    <i class="fas fa-ticket-alt"></i>
    Pemesanan Tiket
</a>

<a href="{{ route('pembayaran.index') }}"
   class="{{ request()->is('pembayaran*') ? 'active-menu' : '' }}">
    <i class="fas fa-money-check-alt"></i>
    Pembayaran
</a>

<a href="{{ route('laporan.index') }}"
   class="{{ request()->is('laporan*') ? 'active-menu' : '' }}">
    <i class="fas fa-chart-bar"></i>
    Laporan
</a>

@if(Auth::user()->role == 'admin')

<a href="{{ route('users.index') }}"
   class="{{ request()->is('users*') ? 'active-menu' : '' }}">
    <i class="fas fa-users"></i>
    Pengguna
</a>

@endif

<div class="mt-5 text-center">

    <small class="text-secondary">
        Sistem Pemesanan Tiket Kapal
    </small>

    <br>

    <small class="text-secondary">
        Version 1.0
    </small>

</div>
```

</div>