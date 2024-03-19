<nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        @php
            $routeName = request()->route()->getName();
        @endphp
        <div class="nav">
            <a class="nav-link {{ str_contains($routeName, 'dashboards') ? 'bg-primary text-white' : 'text-dark' }}"
                href="{{ route('dashboards') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ str_contains($routeName, 'users') ? 'bg-primary text-white' : 'text-dark' }}"
                href="{{ route('users') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Manajemen User
            </a>
            <a class="nav-link {{ str_contains($routeName, 'products') ? 'bg-primary text-white' : 'text-dark' }}"
                href="{{ route('products') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Manajemen Produk
            </a>
        </div>
    </div>
</nav>
