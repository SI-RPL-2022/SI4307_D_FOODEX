<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{ route('index') }}"><img alt="" src="{{ asset('assets/images/logo.png') }}" style="height: 45px;"></a>
                    </li>
                    @if (Request::is('admin*'))
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ Request::is('admin') ? 'active' : '' }}"
                            href="{{ route('admin') }}" aria-current="page"">Beranda</a>
                    </li>
                    <li class="nav-item text-dark {{ Request::is('admin/articles*') ? 'active' : '' }}">
                        <a class="nav-link text-dark" href="{{ route('admin.articles.index') }}">Artikel</a>
                    </li>
                    <li class="nav-item text-dark {{ Request::is('admin/menus*') ? 'active' : '' }}">
                        <a class="nav-link text-dark" href="{{ route('admin.menus.index') }}">Menu</a>
                    </li>
                    <li class="nav-item text-dark {{ Request::is('admin/subscriptions*') ? 'active' : '' }}">
                        <a class="nav-link text-dark" href="{{ route('admin.subscriptions.index') }}">Paket</a>
                    </li>
                    <li class="nav-item text-dark {{ Request::is('admin/orders*') ? 'active' : '' }}">
                        <a class="nav-link text-dark" href="{{ route('admin.orders.index') }}">Pembelian</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ Request::is('/') ? 'active' : '' }}"
                            href="{{ route('index') }}" aria-current="page"">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ Request::is('menus*') ? 'active' : '' }}" href="{{ route('menus') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ Request::is('subscriptions*') ? 'active' : '' }}" href="{{ route('subscription.index') }}">Berlangganan</a>
                    </li>
                    @user()
                    <li class="nav-item">
                        <a class="nav-link text-dark {{ Request::is('orders*') ? 'active' : '' }}" text-dark" href="{{ route('orders.index') }}">Status</a>
                    </li>
                    @enduser()
                    @endif
                </ul>
                <div class="d-flex d-sm-inline">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        @if (Auth::check())
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark"><span class="fa-solid fa-bell"></span></a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="{{ route('cart.index') }}"><span class="fa-solid fa-cart-shopping"></span></a>
                            </li>
                            <div class="dropdown text-end align-self-center me-3">
                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset(auth()->user()->photo) }}" alt="mdo" width="30"
                                        height="30" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                    <li><a class="dropdown-item" href="#">Hi, {{ auth()->user()->name }}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @if (auth()->user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('admin') }}">Dashboard</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    @endif
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="dropdown-item" href="#" role="button" type="submit">Sign out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main class="mb-5 p-3 section-banner mt-5" style="height: 100%;">
        <div class="container p-0 col-lg-8">
            @yield('content')
        </div>
    </main>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-primary-lighter text-dark mt-auto">

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-4 col-xl-4 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <span class="fa-solid fa-bowl-food me-3"></span>Foodex
                        </h6>
                        <p>
                            Foodex merupakan aplikasi berbasis website yang berfungsi menjadi layanan pemesanan makanan sehat digital, dimana dalam aplikasi ini pelanggan dapat melakukan pemesanan makanan sehat sesuai menu yang telah di buat dalam paket yang telah disediakan dalam menu..
                        </p>
                    </div>
                    <!-- Grid column -->
                    <div class="col-2"></div>

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-4 col-xl-4 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Hubungi Kami
                        </h6>
                        <p><span class="fas fa-home me-3"></span> Jl. suka-suka, Bandung, Jawa Barat</p>
                        <p><span class="fas fa-phone me-3"></span> +628080000</p>
                        <p>
                            <span class="fas fa-envelope me-3"></span>
                            foodex@gmail.com
                        </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom container">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>&copy;Foodex, 2022.</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <span class="me-3">Follow Kami: </span>
                <a href="" class="me-4 text-reset text-decoration-none">
                    <img src="{{ asset('assets/images/instagram.png') }}" alt="" class="footer-social">
                </a>
                <a href="" class="me-4 text-reset text-decoration-none">
                    <img src="{{ asset('assets/images/facebook.png') }}" alt="" class="footer-social">
                </a>
                <a href="" class="me-4 text-reset text-decoration-none">
                    <img src="{{ asset('assets/images/twitter.png') }}" alt="" class="footer-social">
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);

    @if (session('alert_type'))
        Swal.fire({
            icon: "{{ session('alert_type') }}",
            title: "{{ session('alert_message') }}"
        })
    @endif
    </script>
    @yield('script')
</body>

</html>
