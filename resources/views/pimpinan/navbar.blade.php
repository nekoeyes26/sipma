<!-- Navbar Start -->
<div class="container bg-primary">
    <nav class="navbar navbar-dark navbar-expand-lg py-0 bg-primary">
        <a href="{{ route('pimpinan.aduan') }}" class="navbar-brand">
            <h1 class="text-white fw-bold d-block">SIP<span class="text-secondary">MA</span> </h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-xl-auto p-0">
                <a href="{{ route('pimpinan.aduan') }}" class="nav-item nav-link">Beranda</a>
                <a href="{{ route('pimpinan.tentang') }}" class="nav-item nav-link {{ Request::is('pimpinan/tentang') ? 'active' : '' }}">Tentang</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::is('pimpinan/aduan*') ? 'active' : '' }}" data-bs-toggle="dropdown">List Aduan</a>
                    <div class="dropdown-menu rounded">
                        <a href="{{ route('pimpinan.aduan') }}" class="dropdown-item {{ Request::is('pimpinan/aduan') ? 'active' : '' }}">Aduan Diterima</a>
                        <a href="{{ route('pimpinan.aduan.level1') }}" class="dropdown-item {{ Request::is('pimpinan/aduan/level1') ? 'active' : '' }}">Aduan Level 1</a>
                        <a href="{{ route('pimpinan.aduan.level2') }}" class="dropdown-item {{ Request::is('pimpinan/aduan/level2') ? 'active' : '' }}">Aduan Level 2</a>
                        <a href="{{ route('pimpinan.aduan.level3') }}" class="dropdown-item {{ Request::is('pimpinan/aduan/level3') ? 'active' : '' }}">Aduan Level 3</a>
                        <a href="{{ route('pimpinan.aduan.selesai') }}" class="dropdown-item {{ Request::is('pimpinan/aduan/selesai') ? 'active' : '' }}">Aduan Selesai</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akun</a>
                    <div class="dropdown-menu rounded">
                        @if (Auth::guard('guard3')->check() && Auth::guard('guard3')->user()->nip_pimpinan)
                            <a href="#" class="dropdown-item">{{ Auth::guard('guard3')->user()->nip_pimpinan }}</a>
                        @endif
                        @if (Auth::guard('guard1')->check() || Auth::guard('guard2')->check() || Auth::guard('guard3')->check())
                            <form action="/pimpinan/logout" method="POST">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        @else
                            <a href="#" class="dropdown-item">Login</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
