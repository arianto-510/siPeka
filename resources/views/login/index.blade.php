<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SiPeka - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('back-end/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('back-end/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body style="background-color: #198754">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-6">
                {{-- xl-10 col-lg-12 col-md-9 --}}

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background-image: url({{ asset('front-end/images/eat5.png') }})"></div> --}}
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                                    </div>
                                    @if (session()->has('gagal'))
                                        <div class="alert alert-danger">{{ session('gagal') }}</div>
                                    @endif
                                    <form class="user" method="post" action="/login">
                                        @csrf
                                        @error('username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Masukkan Username" name="username"
                                                value="{{ old('username') }}" required>
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Masukkan Password" required name="password"
                                                value="{{ old('password') }}">
                                        </div>
                                        <button style="background-color: #198754;"
                                            class="btn btn-primary btn-user btn-block" type="submit" name="login">
                                            Login
                                        </button>
                                    </form>
                                    <hr>

                                    {{-- Link Forgot Password --}}
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    {{-- End Link --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('back-end/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('back-end/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('back-end/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('back-end/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
