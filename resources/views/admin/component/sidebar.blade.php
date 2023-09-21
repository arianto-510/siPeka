    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="{{ asset('front-end/favicon.png') }}">
            </div>
            <div class="sidebar-brand-text mx-3">Lia Cafe & Resto</div>
        </a>


        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>


        <li class="nav-item active">
            <a class="nav-link" href="/admin/kasir">
                <i class="fas fa-fw fa-wallet"></i>
                <span>Kasir</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="/adminmenu">
                <i class="fas fa-fw fa-monument"></i>
                <span>Kelola Menu</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="/admin/laporan">
                <i class="fas fa-clipboard-list"></i>
                <span>Laporan Penjualan</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
