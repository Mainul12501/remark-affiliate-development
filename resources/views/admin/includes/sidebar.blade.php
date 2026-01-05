
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
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="mdi mdi-account-multiple-plus side-menu__icon"></i>
                        <span class="side-menu__label">Product Management</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                            <li class="slide">
                                <a href="" class="side-menu__item">Brands</a>
                            </li>
                        <li class="slide">
                            <a href="" class="side-menu__item">Categories</a>
                        </li>
                        <li class="slide">
                            <a href="" class="side-menu__item">Categories</a>
                        </li>

                    </ul>
                </li>


                <li class="slide">
                    <a href="icons.html" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mastodon" viewBox="0 0 16 16">
                            <path d="M11.19 12.195c2.016-.24 3.77-1.475 3.99-2.603.348-1.778.32-4.339.32-4.339 0-3.47-2.286-4.488-2.286-4.488C12.062.238 10.083.017 8.027 0h-.05C5.92.017 3.942.238 2.79.765c0 0-2.285 1.017-2.285 4.488l-.002.662c-.004.64-.007 1.35.011 2.091.083 3.394.626 6.74 3.78 7.57 1.454.383 2.703.463 3.709.408 1.823-.1 2.847-.647 2.847-.647l-.06-1.317s-1.303.41-2.767.36c-1.45-.05-2.98-.156-3.215-1.928a4 4 0 0 1-.033-.496s1.424.346 3.228.428c1.103.05 2.137-.064 3.188-.189zm1.613-2.47H11.13v-4.08c0-.859-.364-1.295-1.091-1.295-.804 0-1.207.517-1.207 1.541v2.233H7.168V5.89c0-1.024-.403-1.541-1.207-1.541-.727 0-1.091.436-1.091 1.296v4.079H3.197V5.522q0-1.288.66-2.046c.456-.505 1.052-.764 1.793-.764.856 0 1.504.328 1.933.983L8 4.39l.417-.695c.429-.655 1.077-.983 1.934-.983.74 0 1.336.259 1.791.764q.662.757.661 2.046z"/>
                        </svg>
                        <span class="side-menu__label">Brands</span>
                    </a>
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
