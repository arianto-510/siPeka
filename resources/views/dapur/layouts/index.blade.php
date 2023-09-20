<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="mtc.com">
    <link rel="shortcut icon" href="{{ url('front-end/favicon.png') }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ url('front-end/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ url('front-end/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ url('front-end/css/style.css') }}" rel="stylesheet">
    <title>SiPeka - {{ $title }}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
</head>

<body>

    @include('dapur.component.navbar')

    @if (Request::path() == 'dapur')
        <!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">

                        {{-- @auth --}}
                        <div class="intro-excerpt">
                            <h1>Selamat Datang {{ auth()->user()->name }}</h1>
                            <h1 class="mb-4">Lia Cafe & Resto</h1>
                            <p><a href="/dapur/pesanan" class="btn btn-secondary me-2">Pesanan</a></p>
                        </div>
                        {{-- @endauth --}}
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="{{ asset('front-end/images/banner.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero Section -->
    @endif

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                @yield('content')

            </div>
        </div>
    </div>
    <!-- End Product Section -->


    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Si-Peka</a>
                    </div>
                    <p class="mb-4">Sistem Informasi Pengelolahan Kafe</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-tiktok"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Tentang</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Dukungan</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Menu</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All Reserved -- <a href="#">By Media Tama Computer</a>
                            <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->
    <script src="{{ url('front-end/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('front-end/js/tiny-slider.js') }}"></script>
    <script src="{{ url('front-end/js/custom.js') }}"></script>
</body>

</html>
