<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-divider">@lang('main.main')</li>
                @auth('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home', app()->getLocale())}}"><i class="fas fa-fw fa-columns"></i>@lang('main.dashboard')</a>
                </li>
                <li class="nav-divider">@lang('main.management')</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index', app()->getLocale())}}"><i class="fas fa-fw fa-user"></i>@lang('main.users')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-sort-amount-down"></i>@lang('main.product_levels')</a>
                    <div id="submenu-10" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('categories.index', app()->getLocale())}}">@lang('main.categories')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('types.index', app()->getLocale())}}">@lang('main.types')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('brands.index', app()->getLocale())}}">@lang('main.brands')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('models.index', app()->getLocale())}}">@lang('main.models')</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('suppliers.index', app()->getLocale())}}"><i class="fas fa-car"></i> @lang('main.suppliers')</a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('customers.index', app()->getLocale())}}"><i class="fas fa-users"></i> @lang('main.customers')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index', app()->getLocale())}}"><i class="far fa-envelope-open"></i> @lang('main.products')</a>
                </li>
                @auth('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('expenses.index', app()->getLocale())}}"><i class="far fa-file-alt"></i> @lang('expenses.expenses')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reports.index', app()->getLocale())}}"><i class="far fa-file-alt"></i> @lang('main.reports')</a>
                </li>
                @endauth
                <!--<li class="nav-item">
                    <a class="nav-link" href="{{URL('admin/requests')}}"><i class="far fa-envelope-open"></i> Users Requests</a>
                </li>-->
            </ul>
        </div>
    </nav>
</div>
