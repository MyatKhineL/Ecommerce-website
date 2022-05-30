<div class="container-fluid" id="header">
    <div class="container">
        <nav class="navbar  navbar-expand-lg">
            <a class="navbar-brand text-white" href="{{ route('index') }}">Online Shopping</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <div class="">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pending') }}">Your Order</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">User</a>
                            <ul class="dropdown-menu">
                                @auth
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">Welcome {{ Auth::user()->name }}</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('user.login') }}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.register') }}">Register</a></li>
                                @endauth
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showCart') }}" tabindex="-1"
                               aria-disabled="true">
                                Cart
                                <small class="badge bg-danger">{{ $cart_count }}</small>
                            </a>
                        </li>
                    </ul>
                </div>
                <form action="{{ route('filter.search') }}" method="get" class="row g-2">
                    <div class="col-8">
                        <input class="form-control mr-sm-2"
                               type="search" placeholder="Search"
                               name="search"
                               aria-label="Search">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Welcome From Online Shopping Website</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium
                    sequi voluptas similique sed minima rerum labore reprehenderit, illo
                    recusandae quasi tempore placeat aliquam autem, a soluta nisi totam
                    temporibus dolorem!
                </p>
                @auth
                @else
                    <a href="{{ route('user.register') }}" class="btn btn-outline-primary">SignUp</a>
                    <a href="{{ route('user.login') }}" class="btn btn-primary">Login</a>
                @endauth
            </div>
            <div class="col-md-6 text-center">
                <img class=""
                     src="{{ asset('image/homePage.png') }}"
                     alt="">
            </div>
        </div>
    </div>
</div>
