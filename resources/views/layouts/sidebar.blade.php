<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">COOL</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">CROCKS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">DASHBOARD</li>
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('home.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="nav-item {{ !request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('home.index')}}" class="nav-link has-dropdown">
                <i class="fas fa-th"></i><span>DASHBOARD</span></a>
               <ul class="dropdown-menu">
                    <li><a href="{{ route('user.index') }}" class="nav-link">USER</a></li>
                    <li><a href="{{ route('kategori.index') }}" class="nav-link">KATEGORI</a></li>
                    <li><a href="{{ route('produk.index') }}" class="nav-link">PRODUK</a></li>
                    <li><a href="{{ route('supplier.index') }}" class="nav-link">SUPPLIER</a></li>
                    <li><a href="{{ route('invoice.index') }}" class="nav-link">INVOICE</a></li>
                    <li><a href="{{ route('stokmasuk.index') }}" class="nav-link">STOK MASUK</a></li>
                    <li><a href="{{ route('logout') }}" class="nav-link">LOGOUT</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
