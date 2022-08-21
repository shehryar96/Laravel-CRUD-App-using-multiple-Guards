<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="https://gharbaar.com/assets/site/images/logo-colorful.svg" alt="GHARBAAR.COM" style="width: 300px;">
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1 ps">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                
                @auth('web-admins')
                <li class="@yield('admin_sidebar')">
                    <a href="{{ route('admin.dashboard') }}" >
                        <i class="far fa-check-square"></i>Admin Dashboard</a>
                </li>
                @endauth

                @auth('web')
                <li class="@yield('user_sidebar')">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-user"></i>User Dashboard</a>
                </li>
                @endauth

                @auth('web-bloggers')
                <li class="@yield('bloggers_sidebar')">
                    <a href="{{route('blogger.dashboard')}}">
                        <i class="fas fa-users"></i>Blogger Dashboard</a>
                </li>
                @endauth
               
               
            </ul>
        </nav>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
</aside>