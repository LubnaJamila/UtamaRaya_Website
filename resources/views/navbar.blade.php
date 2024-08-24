<style>
    .logout-item {
        color: black;
        transition: color 0.3s;
    }

    .logout-item:hover {
        color: white !important;
        background-color: #B80000;
    }

    .navbar span {
        color: black;
    }

    .dropdown-arrow {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 5px;
        vertical-align: middle;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #000;
    }

    .nav-link {
        position: relative;
    }

    .nav-link .dropdown-arrow {
        display: inline-block;
        margin-left: 5px;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #000;
        vertical-align: middle;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('frontend/assets/img/Logo-UTR.png') }}" width="150" height="auto" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars-staggered"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav navbar-nav-center ms-auto py-0">
            <li class="nav-item">
                <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            </li>
            <li class="nav-item">
                <a href="/about" class="nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ isset($pageTitle) ? 'active' : '' }}"
                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ isset($pageTitle) ? $pageTitle : 'Service' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item {{ Request::is('ballroom') ? 'active' : '' }}"
                            href="/service/ballroom">Ballroom Wedding</a></li>
                    <li><a class="dropdown-item {{ Request::is('watersport') ? 'active' : '' }}"
                            href="/service/watersport">Water Sport</a></li>
                    <li><a class="dropdown-item {{ Request::is('rental-bike') ? 'active' : '' }}"
                            href="/service/rental-bike">Rental Bike</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('penginapan.list') }}"
                    class="nav-link {{ Request::is('penginapan') ? 'active' : '' }}">Penginapan</a>
            </li>
            <li class="nav-item">
                <a href="/umkm" class="nav-link {{ Request::is('umkm') ? 'active' : '' }}">UMKM</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            @guest
                <li class="nav-item">
                    <a class="btn btn-outline-black" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-orange" href="/register">Register</a>
                </li>
            @else
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="userDropdown">
                            <span>{{ Auth::user()->nama_lengkap }}</span>
                            <span class="dropdown-arrow"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="nav-link logout-item" href="{{ route('dashboard') }}">
                                Pesanan
                            </a>
                            <a class="nav-link logout-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
                </ul>
                </li>
            </ul>

        @endguest
        </ul>
    </div>
</nav>
