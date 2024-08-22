<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-menu"></i>
        </button>
        <div class="sidebar-logo">
            <img src="{{ asset('frontend/assets/img/logo-UTR.png') }}" alt="Logo" width="150px">
        </div>
    </div>
    <ul class="sidebar-nav">
        @if (auth()->user()->jabatan === 'admin')
            <li class="sidebar-item {{ Request::is('dashboard_admin') ? 'active' : '' }}">
                <a href="/dashboard_admin" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#master-menu" aria-expanded="" aria-controls="master-menu">
                    <i class="lni lni-layout"></i>
                    <span>Master</span>
                </a>
                <ul id="master-menu"
                    class="sidebar-dropdown list-unstyled collapse {{ Request::is('master/*') ? 'show' : '' }}">
                    <li class="sidebar-item {{ Request::is('master/akomodasi') ? 'active' : '' }}">
                        <a href="/master/akomodasi" class="sidebar-link">Akomodasi</a>
                    </li>
                    <li class="sidebar-item {{ Request::is('master/watersport') ? 'active' : '' }}">
                        <a href="/master/watersport" class="sidebar-link">Water Sport</a>
                    </li>
                    <li class="sidebar-item {{ Request::is('master/rental_bike') ? 'active' : '' }}">
                        <a href="/master/rental_bike" class="sidebar-link">Rental Bike</a>
                    </li>
                    <li class="sidebar-item {{ Request::is('master/wedding_ballroom') ? 'active' : '' }}">
                        <a href="/master/wedding_ballroom" class="sidebar-link">Wedding Ballroom</a>
                    </li>
                    <li class="sidebar-item {{ Request::is('master/rekening') ? 'active' : '' }}">
                        <a href="/master/rekening" class="sidebar-link">Rekening</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#validasi-menu" aria-expanded="" aria-controls="validasi-menu">
                    <i class="lni lni-wheelbarrow"></i>
                    <span>Validasi</span>
                </a>
                <ul id="validasi-menu"
                    class="sidebar-dropdown list-unstyled collapse {{ Request::is('validasi/*') ? 'show' : '' }}">
                    <li class="sidebar-item {{ Request::is('validasi/pembayaran') ? 'active' : '' }}">
                        <a href="/validasi/pembayaran" class="sidebar-link">Pembayaran</a>
                    </li>
                    <li class="sidebar-item {{ Request::is('validasi/pembatalan') ? 'active' : '' }}">
                        <a href="/validasi/pembatalan" class="sidebar-link">Pembatalan</a>
                    </li>
                    <li class="sidebar-item {{ Request::is('validasi/umkm') ? 'active' : '' }}">
                        <a href="/validasi/umkm" class="sidebar-link">UMKM</a>
                    </li>
                </ul>
            </li>
        @endif

        @if (auth()->user()->jabatan === 'umkm')
            <li class="sidebar-item {{ Request::is('dashboard_umkm') ? 'active' : '' }}">
                <a href="/dashboard_umkm" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('umkm/produk') ? 'active' : '' }}">
                <a href="/umkm/produk" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>Produk</span>
                </a>
            </li>
             <li class="sidebar-item {{ Request::is('pengaturan/profile') ? 'active' : '' }}">
            <a href="/pengaturan/profile" class="sidebar-link">
                <i class="lni lni-cog"></i>
                <span>Pengaturan</span>
            </a>
        </li>
        @endif   
        @if (auth()->user()->jabatan === 'user')
            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('pembatalan') ? 'active' : '' }}">
                <a href="/pembatalan" class="sidebar-link">
                    <i class="lni lni-circle-minus"></i>
                    <span>Pembatalan</span>
                </a>
            </li>
             <li class="sidebar-item {{ Request::is('pengaturan') ? 'active' : '' }}">
            <a href="/pengaturan" class="sidebar-link">
                <i class="lni lni-cog"></i>
                <span>Pengaturan</span>
            </a>
        </li>
        @endif   

    </ul>
</aside>
