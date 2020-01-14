<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                    <!-- </button> -->
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                    <li {!! $routeName[0] == 'dashboard' ? 'class="active"' : '' !!}>
                        <a href="{{ '/dashboard' }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboards</a>
                    </li>
            </ul>
        </div>
    </nav>
</header>
<!-- HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar" id="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li {!! $routeName[0] == 'dashboard' ? 'class="active"' : '' !!}>
                    <a href="{{ '/dashboard' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li {!! $routeName[0] == 'management' ? 'class="active"' : '' !!}>
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tasks"></i> Management </a>

                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li {!! $routeName[1] == 'user' ? 'class="active"' : '' !!}>
                            <a href="{{ '/user' }}"> Users</a>
                        </li>
                        <!-- <li {!! $routeName[1] == 'schedule' ? 'class="active"' : '' !!}>
                            <a href="{{ '/schedule' }}"> Schedule</a>
                        </li>
                        <li {!! $routeName[1] == 'role' ? 'class="active"' : '' !!}>
                            <a href="{{ '/role' }}">Role</a>
                        </li> -->
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- MENU SIDEBAR-->