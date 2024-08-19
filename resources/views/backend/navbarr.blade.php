<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline"
                    style="font-weight: 700; color:black">{{ Auth::user()->nama_lengkap }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('backend/assets/img/undraw_profile.svg') }}"
                    alt="Profile">
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2" style="font-weight: 700 padding-right:10px"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
