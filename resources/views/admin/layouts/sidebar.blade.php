<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-divider">Main</li>
                <!--<li class="nav-item ">
                    <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                    <div id="submenu-1" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                                <div id="submenu-1-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.html">E Commerce Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-product.html">Product List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-product-single.html">Product Single</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-product-checkout.html">Product Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard-finance.html">Finance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard-sales.html">Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>
                                <div id="submenu-1-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-influencer.html">Influencer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="influencer-finder.html">Influencer Finder</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="influencer-profile.html">Influencer Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-3" aria-controls="submenu-1-3">Contacts</a>
                                <div id="submenu-1-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-contact.html">Contacts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-contact-list.html">Contact List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-contact-cardlist.html">Contact Cardlist</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-4" aria-controls="submenu-1-4">Invoice</a>
                                <div id="submenu-1-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-invoice.html">Invoice</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-invoice-list.html">Invoice List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-invoice-form.html">Invoice Form</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>-->

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
                                <a class="nav-link" href="{{URL('admin/sectors')}}">Sectors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('admin/categories')}}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('admin/types')}}">Types</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('admin/products')}}">Products</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11"><i class="fas fa-sort-amount-down"></i>Company Devisions</a>
                    <div id="submenu-11" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('admin/company_devisions')}}">Company Devisions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Company Sub-Devisions</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/companies')}}"><i class="fas fa-building"></i>Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/catalogs')}}"><i class="fas fa-clipboard-list"></i>Catalogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/projects')}}"><i class="fas fa-microchip"></i>Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/news')}}"><i class="far fa-newspaper"></i>News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/events')}}"><i class="far fa-calendar"></i>Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/articles')}}"><i class="far fa-file-alt"></i>Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/jobs')}}"><i class="far fa-user-circle"></i>Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/requests')}}"><i class="far fa-envelope-open"></i>Users Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/slider')}}"><i class="far fa-images"></i>Slider</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/sponsors')}}"><i class="far fa-money-bill-alt"></i>Sponsors</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
