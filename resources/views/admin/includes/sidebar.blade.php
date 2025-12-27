<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{url('admin/dashboard')}}" class="header-logo">
            <img src="{{asset('/')}}backend/build/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
            <img src="{{asset('/')}}backend/build/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
            <img src="{{asset('/')}}backend/build/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
            <img src="{{asset('/')}}backend/build/assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

  @if(Request::is('admin/*'))

    <div class="main-sidebar" id="sidebar-scroll">
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>

            <ul class="main-menu">

                <li class="slide">
                    <a href="{{url('admin/dashboard')}}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg>
                        <span class="side-menu__label">DASHBOARD</span>
                    </a>
                </li>
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="mdi mdi-account-multiple-plus side-menu__icon"></i>
                        <span class="side-menu__label">User Management</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        @if(hasRole(['super-admin']))
                            <li class="slide">
                                <a href="{{url('/admin/roles')}}" class="side-menu__item">Roles</a>
                            </li>
                           @endhasRole
                        <li class="slide">
                            <a href="{{url('/admin/users')}}" class="side-menu__item">Users</a>
                        </li>

                    </ul>
                </li>
                <!-- End::slide -->
                <li class="slide">
                    <a href="{{url('admin/logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="side-menu__item">
                        <i class="mdi mdi-logout fs-18 me-2 op-7"></i> LOGOUT
                        <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>

            </ul>

            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->
    @endif
</aside>
