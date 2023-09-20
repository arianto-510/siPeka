<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.html">UCR</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            @auth
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'menu' ? 'active' : '' }}">
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'kontak' ? 'active' : '' }}">
                        <a class="nav-link" href="/kontak">Kontak</a>
                    </li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="/cart"><img src="{{ url('front-end/images/cart.svg') }}"></a></li>
                    <form action="/logout" method="post">
                        @csrf
                        <li><button class="btn btn-danger" type="submit">Keluar</button></li>
                    </form>
                </ul>
            @else
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'kontak' ? 'active' : '' }}">
                        <a class="nav-link" href="/kontak">Kontak</a>
                    </li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="/login"><img src="{{ asset('front-end/images/user.svg') }}"></a></li>
                </ul>
            @endauth

        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
