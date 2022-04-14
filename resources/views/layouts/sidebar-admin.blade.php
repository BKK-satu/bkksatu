<div class="shadow navbar-wrapper mr-5" id="navbar-wrapper-main">
    <div class="py-2">
        <a class="text-decoration-none text-black navbar-item text-center d-block py-2" href="/beranda">
            <i class='bx bx-home-alt align-middle text-center d-block'></i>
            <span>Home</span>
        </a>
        <a class="{{ $title == 'dashboard' ? 'nav-active ' : '' }}text-decoration-none text-black navbar-item text-center d-block py-2"
            href="/ad/dashboard">
            <i
                class='bx {{ $title == 'dashboard' ? 'bxs-grid-alt ' : 'bx-grid-alt ' }}align-middle text-center d-block'></i>
            <span>Dashboard</span>
        </a>
        <a class="{{ $title == 'alumni' ? 'nav-active ' : '' }}text-decoration-none text-black navbar-item text-center d-block py-2"
            href="/ad/al/main">
            <i
                class='bx {{ $title == 'alumni' ? 'bxs-book-reader ' : 'bx-book-reader ' }}align-middle text-center d-block'></i>
            <span>Alumni</span>
        </a>
        <a class="{{ $title == 'akun' ? 'nav-active ' : '' }}text-decoration-none text-black navbar-item text-center d-block py-2"
            href="/ad/ak/main">
            <i
                class='bx {{ $title == 'akun' ? 'bxs-user-circle ' : 'bx-user-circle ' }}align-middle text-center d-block'></i>
            <span>Akun</span>
        </a>
        <a class="{{ $title == 'informasi' ? 'nav-active ' : '' }}text-decoration-none text-black navbar-item text-center d-block py-2"
            href="/ad/in/main">
            <i class='bx {{ $title == 'informasi' ? 'bxs-news ' : 'bx-news ' }}align-middle text-center d-block'></i>
            <span>Informasi</span>
        </a>
        <a class="{{ $title == 'loker' ? 'nav-active ' : '' }}text-decoration-none text-black navbar-item text-center d-block py-2"
            href="/ad/lk/main">
            <i
                class='bx {{ $title == 'loker' ? 'bxs-briefcase-alt-2 ' : 'bx-briefcase-alt-2 ' }}align-middle text-center d-block'></i>
            <span>Loker</span>
        </a>
        <a class="{{ $title == 'mitra' ? 'nav-active ' : '' }}text-decoration-none text-black navbar-item text-center d-block py-2"
            href="/ad/mt/main">
            <i
                class='bx {{ $title == 'mitra' ? 'bxs-building-house ' : 'bx-building-house ' }}align-middle text-center d-block'></i>
            <span>Mitra</span>
        </a>
        <div class="navbar-logout text-center d-block py-3">
            <div class="btn btn-primary">
                <i class='bx bx-log-out-circle align-middle text-center d-block'></i>
                <span>Logout</span>
            </div>
        </div>
    </div>
</div>
