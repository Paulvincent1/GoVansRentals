<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/logo.png') }}" alt=""
                style="width: 50px; height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="{{ asset('assets/logo.png') }}"
                        alt="" style="width: 50px; height: 50px;"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3  d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active mx-2 nav-highlight' : 'mx-2' }} "
                            aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ Request::is('van') ? 'active mx-2 nav-highlight' : 'mx-2' }} "
                            href="{{ route('van') }}">Rent</a>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Status
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('my-request') }}">MY REQUEST</a></li>
                            <li><a class="dropdown-item" href="{{ route('request-status') }}">REQUEST STATUS</a></li>

                        </ul>
                    </li>
                    @guest
                        <li class="nav-item mx-2">
                            <a class="nav-link {{ Request::is('signup') ? 'active mx-2 nav-highlight' : 'mx-2' }} "
                                href="{{ route('signup') }}">Signup</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link {{ Request::is('login') ? 'active mx-2 nav-highlight' : 'mx-2' }} "
                                href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <li><button class="dropdown-item text-center">Logout</button></li>
                                </form>
                            </ul>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </div>
</nav>
