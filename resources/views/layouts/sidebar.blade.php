<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">SIPIN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SIPIN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="nav-item {{ !request()->is('/') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Data</span></a>
               {{-- <ul class="dropdown-menu">
                    <li><a href="{{ route('#') }}" class="nav-link">Siswa Magang</a></li>
                    <li><a href="{{ route('#') }}" class="nav-link">ATK</a></li>
                    <li><a href="{{ route('#') }}" class="nav-link">ATK Transaksi</a></li>
                </ul>
            </li>
        </ul>
    </aside>--}}
</div>
