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
            <li class="dropdown{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Management Section -->
            <li class="menu-header">Management</li>
            <li class="dropdown{{ request()->routeIs('admin.barang.index') ? ' active' : '' }}">
                <a href="{{ route('admin.barang.index') }}" class="nav-link">
                    <i data-feather="box"></i><span>Barang</span>
                </a>
            </li>
            
              <!-- Barang Masuk -->
            <li class="dropdown{{ request()->routeIs('admin.barangMasuk.index') ? ' active' : '' }}">
                <a href="{{ route('admin.barangMasuk.index') }}" class="nav-link">
                    <i data-feather="inbox"></i><span>Barang Masuk</span>
                </a>
            </li>

        <!-- Barang Keluar -->
        <li class="dropdown{{ request()->routeIs('admin.barangKeluar.index') ? ' active' : '' }}">
            <a href="{{ route('admin.barangKeluar.index') }}" class="nav-link">
                <i data-feather="arrow-right-circle"></i><span>Barang Keluar</span>
            </a>
        </li>
            <!-- Products Management -->
            <li class="dropdown{{ request()->routeIs('admin.products.index') ? ' active' : '' }}">
                <a href="{{ route('admin.products.index') }}" class="nav-link">
                    <i data-feather="box"></i><span>Products</span>
                </a>
            </li>
            <!-- Suppliers Management -->
             <!-- Category Management -->
            <li class="dropdown{{ request()->routeIs('admin.categories.index') ? ' active' : '' }}">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i data-feather="tag"></i><span>Kategori</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.suppliers.index') ? ' active' : '' }}">
                <a href="{{ route('admin.suppliers.index') }}" class="nav-link">
                    <i data-feather="truck"></i><span>Suppliers</span>
                </a>
            </li>
            <!-- Orders Management -->
            <li class="dropdown{{ request()->routeIs('admin.orders.index') ? ' active' : '' }}">
                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                    <i data-feather="shopping-cart"></i><span>Orders</span>
                </a>
            </li>
            <!-- Customers Management -->
            <li class="dropdown{{ request()->routeIs('admin.customers.index') ? ' active' : '' }}">
                <a href="{{ route('admin.customers.index') }}" class="nav-link">
                    <i data-feather="users"></i><span>Customers</span>
                </a>
            </li>
            <!-- User Management (Admin, Staff) -->
            <li class="dropdown{{ request()->routeIs('admin.users.index') ? ' active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i data-feather="user-check"></i><span>Users</span>
                </a>
            </li>

            <!-- Reports Section -->
            <li class="menu-header">Reports</li>
            <li class="dropdown{{ request()->routeIs('admin.orders.reports') ? ' active' : '' }}">
                <a href="{{ route('admin.orders.reports') }}" class="nav-link">
                    <i data-feather="bar-chart-2"></i><span>Orders Reports</span>
                </a>
            </li>
            

            <!-- Settings Section -->
            <li class="menu-header">Settings</li>
            <li class="dropdown{{ request()->routeIs('admin.settings.index') ? ' active' : '' }}">
                <a href="{{ route('admin.settings.index') }}" class="nav-link">
                    <i data-feather="settings"></i><span>App Settings</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.roles.index') ? ' active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" class="nav-link">
                    <i data-feather="shield"></i><span>Roles & Permissions</span>
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
