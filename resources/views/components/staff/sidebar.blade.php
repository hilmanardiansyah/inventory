<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="/assets/images/logo/logo-inventory.png" style="width: 60px; height: 60px" class="header-logo" />
                <span class="logo-name">Inventory App</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <!-- Main Navigation -->
            <li class="menu-header">Main Navigation</li>
            <li class="dropdown{{ request()->routeIs('staff.dashboard') ? ' active' : '' }}">
                <a href="{{ route('staff.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Management Section -->
            <li class="menu-header">Management</li>
            <li class="dropdown{{ request()->routeIs('staff.barang.index') ? ' active' : '' }}">
                <a href="{{ route('staff.barang.index') }}" class="nav-link">
                    <i data-feather="box"></i><span>Barang</span>
                </a>
            </li>

            <!-- Barang Masuk -->
            <li class="dropdown{{ request()->routeIs('staff.barangMasuk.index') ? ' active' : '' }}">
                <a href="{{ route('staff.barangMasuk.index') }}" class="nav-link">
                    <i data-feather="inbox"></i><span>Barang Masuk</span>
                </a>
            </li>

            <!-- Barang Keluar -->
            <li class="dropdown{{ request()->routeIs('staff.barangKeluar.index') ? ' active' : '' }}">
                <a href="{{ route('staff.barangKeluar.index') }}" class="nav-link">
                    <i data-feather="arrow-right-circle"></i><span>Barang Keluar</span>
                </a>
            </li>

            <!-- Logout Section -->
            <li class="dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i data-feather="log-out"></i><span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>
</div>
