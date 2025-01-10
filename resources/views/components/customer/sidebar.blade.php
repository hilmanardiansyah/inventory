<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('customer.dashboard') }}">
                <img alt="image" src="/assets/images/logo/logo-inventory.png" style="width: 60px; height: 60px" class="header-logo" />
                <span class="logo-name">Customer Panel</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <!-- Main Navigation -->
            <li class="menu-header">Main Navigation</li>
            <li class="dropdown{{ request()->routeIs('customer.dashboard') ? ' active' : '' }}">
                <a href="{{ route('customer.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Orders Section -->
            <li class="menu-header">Orders</li>
            <li class="dropdown{{ request()->routeIs('customer.orders.index') ? ' active' : '' }}">
                <a href="{{ route('customer.orders.index') }}" class="nav-link">
                    <i data-feather="shopping-cart"></i><span>My Orders</span>
                </a>
            </li>

            <!-- Profile Section -->
            <li class="menu-header">Account</li>
            <li class="dropdown{{ request()->routeIs('customer.profile') ? ' active' : '' }}">
                <a href="{{ route('customer.profile.index') }}" class="nav-link">
                    <i data-feather="user"></i><span>My Profile</span>
                </a>
            </li>

            <!-- Logout -->
            <li class="dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i data-feather="log-out"></i><span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>
</div>
