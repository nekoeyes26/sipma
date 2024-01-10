<!-- Navbar Start -->
<div class="container">
    <nav class="navbar navbar-dark navbar-expand-lg py-0 bg-primary">
        <a href="{{ route('home') }}" class="navbar-brand">
            <h1 class="text-white fw-bold d-block">SIP<span class="text-secondary">MA</span> </h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-xl-auto p-0">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::is('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('tata_cara') }}" class="nav-item nav-link {{ Request::is('tata_cara') ? 'active' : '' }}">Tata Cara</a>
                <a href="{{ route('pengaduan') }}" class="nav-item nav-link {{ Request::is('pengaduan') ? 'active' : '' }}">Pengaduan</a>
                @if (Auth::guard('guard2')->check())
                    <a href="{{ route('aduan.saya') }}" class="nav-item nav-link {{ Request::is('aduan_saya') ? 'active' : '' }}">Aduan Saya</a>
                @endif
                <a href="{{ route('tentang') }}" class="nav-item nav-link {{ Request::is('tentang') ? 'active' : '' }}">Tentang</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::is('profil') ? 'active' : '' }}" data-bs-toggle="dropdown">Akun</a>
                    <div class="dropdown-menu rounded">
                        @if (Auth::guard('guard2')->check())
                            <a href="{{ route('profil') }}" class="dropdown-item">Profil</a>
                        @endif
                        @if (Auth::guard('guard1')->check() || Auth::guard('guard2')->check() || Auth::guard('guard3')->check())
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('mahasiswa.login') }}" class="dropdown-item">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
