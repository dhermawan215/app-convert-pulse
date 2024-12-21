<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name') }} | Tukar pulsa</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing-page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('landing-page/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">{{ config('app.name') }}</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#features">Layanan</a></li>
                    <li><a href="#services">Cara Hitung</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="btn-getstarted" href="#">Tukar Sekarang</a>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="testimonials" class="testimonials section light-background mt-5">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pilih Provider</h2>
            </div><!-- End Section Title -->
            <div class="container">
                @inject('bladeTrait', 'App\Services\AppTraitBlade')
                <div class="row g-5">
                    @foreach ($provider as $value)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="testimonial-item d-flex">
                                <div>
                                    <img src="{{ asset($value->provider_image) }}" class="testimonial-img"
                                        alt="">
                                </div>
                                <div>
                                    <h3>Provider: {{ $value->provider_name }} </h3>
                                    <p>
                                        <span>Rate:
                                            {{ $value->rateToTransaction ? $value->rateToTransaction->rate_value : 0 }}</span>
                                    </p>
                                    <a class="text-primary"
                                        href="{{ route('form_tukar_pulsa', $bladeTrait->encryptData($value->id)) }}"
                                        target="" rel="">Tukar sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section>

    </main>

    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-8 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">{{ config('app.name') }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jasa penukaran pulsa ke uang</p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Perusahaan</h4>
                    <ul>
                        <li><a href="#">Tentang kami</a></li>
                        <li><a href="#">Privasi</a></li>
                        <li><a href="#">Syarat & ketentuan</a></li>
                        <li><a href="{{ route('login') }}">Sisi kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Tutorial</h4>
                    <ul>
                        <li><a href="#">Cara penggunaan</a></li>
                        <li><a href="#">Cara transfer Indosat</a></li>
                        <li><a href="#">Cara transfer Telkomsel</a></li>
                        <li><a href="#">Cara transfer XL</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ config('app.name') }}</strong> <span>All
                    Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by: <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('landing-page/assets/js/main.js') }}"></script>

    <script>
        var url =
            '{{ url('
                                                                                                                                                                                                            ') }}';
        var csrf_token = $('meta[name="csrf_token"]').attr("content");
        $(document).ready(function() {
            $("#provider-dropdown").on('change', function() {
                const dropdownValue = $(this).val();
                $.ajax({
                    type: "POST",
                    url: url + "/rate-pulsa",
                    data: {
                        pr: dropdownValue,
                        _token: csrf_token
                    },
                    dataType: "json",
                    success: function(response) {
                        $("#rate-values").val(response.data);
                    }
                });
            });
        });
    </script>

</body>

</html>
