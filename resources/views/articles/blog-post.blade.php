<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{$softland->title}}</title>
    <meta content="{{$softland->apropos}}" name="description">
    <meta content="{{$softland->title}}" name="title">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="intelligence,artificielle,IA,chatgpt,chat,softland,AI,gpt">
    <meta name="language" content="fr">
    <meta name="author" content="meylis1747">

    @cache('linkscript', 5)

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png') }}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css') }}" rel="stylesheet">

    @endcache

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1><a href="index.html">SoftLand</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a class="active" href="{{ route('blog-post',['url'=>$softland->url]) }}">Blog</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Blog Section ======= -->
        <section class="hero-section inner-page">
            <div class="wave">

                <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
                        </g>
                    </g>
                </svg>

            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center hero-text">
                                <h1 data-aos="fade-up" data-aos-delay="">Blog Posts</h1>
                                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Actualité de l'intelligence artificielle.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section">
            @section('content')
            <div class="container">
                <div class="row mb-5">
                @cache('liste_cachee', 1440)
                    @foreach ($articles as $article)
                    <div class="col-md-4">
                        <div class="post-entry">
                            <a href="{{ route('show', ['article'=>$article->id,'url'=> $article->url]) }}" class="d-block mb-4">
                                <img src="/image-project/updload-backoffice/{{$article->image}}" alt="{{ $article->resume }}" class="img-fluid">
                            </a>

                            <div class="post-text">
                                <span class="post-meta">{{ $article->created_at }} &bullet; By <a href="#">Admin</a></span>
                                <h3>{{ $article->titre }}</h3>
                                <p>{{ $article->resume }}</p>
                                <p><a href="{{ route('show', ['article'=>$article->id,'url'=> $article->url]) }}" class="readmore">Voir plus</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endcache
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row site-section pt-0">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h3>Navigation</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h3>Services</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Collaboration</a></li>
                                <li><a href="#">Todos</a></li>
                                <li><a href="#">Events</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h3>Downloads</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Get from the App Store</a></li>
                                <li><a href="#">Get from the Play Store</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <p class="copyright">&copy; Copyright SoftLand. All Rights Reserved</p>
                    <div class="credits">             
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @cache('linkSc', 5)
    <!-- Vendor JS Files -->
    <script src="{{asset('vendor/aos/aos.js') }}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('js/main.js') }}"></script>
    @endcache
</body>

</html>