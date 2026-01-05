<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm">
    <div class="container">
        <!--        <a class="navbar-brand fw-bold" href="#"><img src="{{ asset('frontend') }}/images/home/Group.jpg" alt=""> <span class="fw-light">Affluencer</span></a>-->
        <a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('frontend/images/home/home-logo.png') }}" alt="site-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">

            @if(auth()->check())
                <div class="ms-auto dropdown d-none d-md-block">
                    <a href="#" class="text-decoration-none text-secondary  fw-semibold influencer-user-dropdown show" data-bs-toggle="dropdown" aria-expanded="true">
                        {{ auth()->user()->name ?? 'User Name' }} <i class="bi bi-caret-down-fill ms-1"></i>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="static">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">Logout</a></li>
                    </ul>
                    <form action="{{ route('logout') }}" id="logoutForm" method="post">@csrf</form>
                </div>
            @else
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 m-r-25">
                    <li class="nav-item"><a class="nav-link" href="#">Rewards</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Forum</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Why Affluencer?</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="{{ route('auth.login') }}" class="btn btn-outline-black border text-dark" style="border: 1px solid black!important;">Login</a>
                    <div class="dropdown">
                        <a href="#" class="btn btn-outline-black bg-dark text-white dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sign Up
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('auth.influencer-register') }}">Influencer </a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.partner-register') }}">Partner </a></li>
                        </ul>
                    </div>
                </div>
            @endif

        </div>
    </div>
</nav>

<!-- Mobile Menu Offcanvas -->
<div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-decoration-none text-dark">Profile</a></li>
            <li class="mb-2"><a href="#" class="text-decoration-none text-dark">Settings</a></li>
            <li><a href="#" class="text-decoration-none text-dark">Logout</a></li>
        </ul>
    </div>
</div>
