<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{ basic('name') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ saActive('dashboard') }}">
                <a href="{{ saRoute('dashboard') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title">Dashboard</span>
                    {{-- <span class="badge badge badge-warning badge-pill float-right mr-2">2</span> --}}
                </a>
            </li>
            
            {{-- <li class="navigation-header"><span>Apps</span></li> --}}

            <li class="nav-item">
                <a href="#">
                    <i class="feather icon-settings"></i>
                    <span class="menu-title">Setup</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ saActive('basic.index') }}">
                        <a href="{{ saRoute('basic.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">Basic Manage</span>
                        </a>
                    </li>

                    <li class="{{ saActive('social.index') }}">
                        <a href="{{ saRoute('social.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">Social Manage</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="feather icon-grid"></i>
                    <span class="menu-title">Category Manage</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ saActive('category.index') }}">
                        <a href="{{ saRoute('category.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">Category</span>
                        </a>
                    </li>

                    <li class="{{ saActive('sub.category.index') }}">
                        <a href="{{ saRoute('sub.category.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">Sub-Category</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ saActive('brand.index') }}">
                <a href="{{ saRoute('brand.index') }}">
                    <i class="feather icon-disc"></i>
                    <span class="menu-title">Brand Manage</span>
                </a>
            </li>

            <li class="nav-item {{ saActive('product.index') }}">
                <a href="{{ saRoute('product.index') }}">
                    <i class="feather icon-layers"></i>
                    <span class="menu-title">Product Manage</span>
                </a>
            </li>

            <li class="nav-item {{ saActive('order.index') }}">
                <a href="{{ saRoute('order.index') }}">
                    <i class="feather icon-briefcase"></i>
                    <span class="menu-title">Order Manage</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="feather icon-log-out"></i>
                    <span class="menu-title">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<form id="logout-form" action="{{ route('software.auth.logout') }}" method="POST" style="display: none;">
    @csrf
</form>