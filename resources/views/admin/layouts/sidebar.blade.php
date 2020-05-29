<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-divider">Main</li>
                @auth('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('/admin')}}"><i class="fas fa-fw fa-columns"></i>Dashboard</a>
                </li>
                <li class="nav-divider">Management</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/users')}}"><i class="fas fa-fw fa-user"></i>Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-sort-amount-down"></i>Product Levels</a>
                    <div id="submenu-10" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('admin/categories')}}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('admin/types')}}">Types</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('admin/brands')}}">Brands</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/suppliers')}}"><i class="fas fa-car"></i> Suppliers</a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/customers')}}"><i class="fas fa-users"></i> Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/products')}}"><i class="far fa-envelope-open"></i> Products</a>
                </li>
                @auth('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/reports')}}"><i class="far fa-file-alt"></i> Reports</a>
                </li>
                @endauth
                <!--<li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/requests')}}"><i class="far fa-envelope-open"></i> Users Requests</a>
                </li>-->
            </ul>
        </div>
    </nav>
</div>
