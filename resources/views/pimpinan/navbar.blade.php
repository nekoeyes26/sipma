<!-- Navbar Start -->
{{-- <div class="container-fluid bg-primary"> --}}
<div class="container bg-primary">
    <nav class="navbar navbar-dark navbar-expand-lg py-0 bg-primary">
        <a href="{{ route('home') }}" class="navbar-brand">
            <h1 class="text-white fw-bold d-block">SIP<span class="text-secondary">MA</span> </h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-xl-auto p-0">
                <a href="{{ route('pimpinan.aduan') }}" class="nav-item nav-link active text-secondary">Beranda</a>
                {{-- <a href="about.html" class="nav-item nav-link">Tata Cara</a> --}}
                {{-- <a href="contact.html" class="nav-item nav-link">Pengaduan</a> --}}
                <a href="{{ route('pimpinan.tentang') }}" class="nav-item nav-link">Tentang</a>
                {{-- @if (Auth::guard('guard1')->check() && Auth::guard('guard1')->user()->nip_bakpk)
                        <a href="#" class="nav-item nav-link">{{ Auth::guard('guard1')->user()->nip_bakpk }}</a>
                    @endif --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">List Aduan</a>
                    <div class="dropdown-menu rounded">
                        <a href="{{ route('pimpinan.aduan') }}" class="dropdown-item">Aduan Diterima</a>
                        <a href="{{ route('pimpinan.aduan.level1') }}" class="dropdown-item">Aduan Level 1</a>
                        <a href="{{ route('pimpinan.aduan.level2') }}" class="dropdown-item">Aduan Level 2</a>
                        <a href="{{ route('pimpinan.aduan.level3') }}" class="dropdown-item">Aduan Level 3</a>
                        <a href="{{ route('pimpinan.aduan.selesai') }}" class="dropdown-item">Aduan Selesai</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akun</a>
                    <div class="dropdown-menu rounded">
                        @if (Auth::guard('guard3')->check() && Auth::guard('guard3')->user()->nip_pimpinan)
                            <a href="#"
                                class="dropdown-item">{{ Auth::guard('guard3')->user()->nip_pimpinan }}</a>
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
{{-- </div> --}}
<!-- Navbar End -->
