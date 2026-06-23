<div class="topbar d-flex justify-content-between align-items-center px-4 py-3 bg-white shadow-sm rounded-4 mb-4">

    <div>
        <h4 class="mb-0 fw-bold text-dark">
            @yield('title')
        </h4>
        <small class="text-muted">
            Sistem Pemesanan Tiket Kapal Ferry
        </small>
    </div>

    <div class="d-flex align-items-center gap-3">

        <!-- Role -->
        <span class="badge rounded-pill px-3 py-2"
              style="background:#dbeafe;color:#2563eb;font-size:13px;">
            <i class="fas fa-user-shield me-1"></i>
            {{ ucfirst(Auth::user()->role) }}
        </span>

        <!-- User -->
        <div class="d-flex align-items-center">
            <div class="me-2 text-end">
                <div class="fw-semibold">
                    {{ Auth::user()->name }}
                </div>
                <small class="text-muted">
                    Online
                </small>
            </div>

            <div class="rounded-circle d-flex align-items-center justify-content-center"
                 style="
                    width:45px;
                    height:45px;
                    background:linear-gradient(135deg,#2563eb,#0f172a);
                    color:white;
                    font-size:18px;
                 ">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                    class="btn btn-outline-danger rounded-pill px-3">
                <i class="fas fa-sign-out-alt me-1"></i>
                Logout
            </button>
        </form>

    </div>

</div>