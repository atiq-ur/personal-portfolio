<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.index') }}"><img src="{{ asset('backend/assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    @if(auth()->user()->is_admin)
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="{{ Route::is('admin.index') ? 'active' : '' }}"><a href="{{ route('admin.index') }}"><i class="ti-dashboard"></i> <span>dashboard</span></a></li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Sidebar
                                        Types
                                    </span></a>
                            <ul class="collapse">
                                <li><a href="index.html">Left Sidebar</a></li>
                                <li><a href="index3-horizontalmenu.html">Horizontal Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.category.index') }}"
                                > <i class="ti-cloud"></i><span>Category</span>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.portfolio.index') }}"
                            > <i class="ti-image"></i><span>Portfolio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        @endif

</div>
<!-- sidebar menu area end -->
