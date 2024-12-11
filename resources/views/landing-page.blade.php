<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

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
            <a class="btn-getstarted" href="{{ route('tukar_pulsa') }}">Tukar Sekarang</a>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <div class="company-badge mb-4">
                                <i class="bi bi-gear-fill me-2"></i>
                                Terpercaya
                            </div>
                            <h1 class="mb-4">
                                Rubah Pulsamu <br>
                                <span class="accent-text">Bertambah Uang Rekeningmu</span>
                            </h1>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="https://tetrapulsa.com/assets/images/hero-image.png" alt="Hero Image"
                                class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <div class="stat-content">
                                <h4>Dipercaya oleh</h4>
                                <p class="mb-0">10+ Juta pengguna</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="stat-content">
                                <h4>4.9/5.0</h4>
                                <p class="mb-0">Penilaian terbaik dari pelanggan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                            <div class="stat-content">
                                <h4>1+ Juta</h4>
                                <p class="mb-0">Transaksi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center justify-content-between">

                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="about-title">Kenapa Memilih Kami
                            Untuk Convert Pulsa?</h2>
                        <p class="about-description">Telah dipercaya oleh ratusan ribu pengguna, dan jutaan transaksi
                            yang kami layani</p>

                        <div class="row feature-list-wrapper">
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> Aman dan Terpercaya</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Proses Kilat</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Berpengalaman</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="https://tetrapulsa.com/assets/images/people-with-floating-icon.png"
                                    alt="Business Meeting" class="img-fluid main-image rounded-4">
                            </div>
                            <div class="experience-badge floating">
                                <h3>5+ <span>Tahun</span></h3>
                                <p>Pengalaman dibidangnya</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Features Cards Section -->
        <section id="features" class="features-cards section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-box orange">
                            <i class="bi bi-currency-exchange"></i>
                            <h4>Rate Terbaik</h4>
                            <p>kami memberikan rate tukar pulsa terbaik</p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="feature-box blue">
                            <i class="bi bi-patch-check"></i>
                            <h4>Aman dan Terpercaya</h4>
                            <p>transaksi yang dilakukan terjamin dan diawasi</p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="feature-box green">
                            <i class="bi bi-cash-coin"></i>
                            <h4>Penukaran ke seluruh bank dan E-Wallet</h4>
                            <p>semua pembayaran all in one</p>
                        </div>
                    </div><!-- End Feature Borx-->
                </div>
            </div>

        </section><!-- /Features Cards Section -->
        <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 40
                                },
                                "480": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 60
                                },
                                "640": {
                                    "slidesPerView": 4,
                                    "spaceBetween": 80
                                },
                                "992": {
                                    "slidesPerView": 6,
                                    "spaceBetween": 120
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="https://tetrapulsa.com/assets/images/p-bca.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="https://tetrapulsa.com/assets/images/p-bni.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="https://tetrapulsa.com/assets/images/p-gojek.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="https://tetrapulsa.com/assets/images/p-mandiri.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="https://tetrapulsa.com/assets/images/p-jago.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img
                                src="https://bri.co.id/o/bri-corporate-theme/images/bri-logo.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="https://shopeepay.co.id/src/pages/home/assets/images/new-homepage/new-spp-logo.svg"
                                class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimoni</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row g-5">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <img src="{{ asset('landing-page/assets/img/testimonials/testimonials-1.jpg') }}"
                                class="testimonial-img" alt="">
                            <h3>Pelanggan</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Terimakasih kak, pelayanan cepat dan memuaskan.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <img src="{{ asset('landing-page/assets/img/testimonials/testimonials-2.jpg') }}"
                                class="testimonial-img" alt="">
                            <h3>Pelanggan</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Mantap, terima kasih min, saya merasa puas ketika melakukan transaksi di
                                    sini</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-item">
                            <img src="{{ asset('landing-page/assets/img/testimonials/testimonials-3.jpg') }}"
                                class="testimonial-img" alt="">
                            <h3>Pelanggan</h3>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Puas banget pokoknya, trusted!</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->


                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Bagaimana Cara dan Perhitungannya</h2>
                <p>Kami berikan simulasi di bawah ini untuk lebih Detailnya
                    (Perhitungan Hasil Convert, biaya + sisa pulsa masing masing provider)</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card">
                            <div class="row mb-2">
                                <h3>Yuk hitung dulu, biar kamu ga bingung</h3>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Jumlah Pulsa</label>
                                    <input type="number" name="jumlah_pulsa" id="jumlah-pulsa-hitung"
                                        class="form-control" placeholder="masukan jumlah pulsa yang akan dikonversi">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">Provider</label>
                                    <select name="provider" class="form-control" id="provider-pulsa">
                                        <option selected value="null">-Pilih Provider-</option>
                                        @foreach ($provider as $values)
                                            <option value="{{ $values->rate_value }}"
                                                data-string="{{ $values->rateToProvider->provider_name }}">
                                                {{ $values->rateToProvider->provider_name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" id="hitung-pulsa"
                                        class="mt-3 btn btn-primary">Hitung</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div><!-- End Service Card -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card">
                            <div class="row mb-2">
                                <h3>Hasil yang akan kamu terima di sini ya..</h3>
                            </div>
                            <div class="row">
                                <h3>Nama Provider: <span id="provider-nama-id"></span></h3>
                                <h4>Rate: <span id="rate-hitung"></span></h4>
                                <h4>Hasil Konversi: <span id="hasil-hitung"></span></h4>
                            </div>
                            <h5 class="text-primary">Hasil yang akan kamu dapat adalah: Rp. <span
                                    id="hasil-hitung-pulsa"></span></h5>
                            <div class="alert alert-primary mt-1" role="alert">
                                Pastikan kamu memiliki pulsa lebih, dari pulsa yang mau kamu konversi ke uang
                            </div>
                        </div><!-- End Service Card -->
                    </div>

                </div>

        </section><!-- /Services Section -->

        <!-- Faq Section -->
        <section class="faq-9 faq section light-background" id="faq">

            <div class="container">
                <div class="row">

                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">FAQ</h2>
                        <p class="faq-description">Tanya kami di sini</p>
                        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                            <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-container">

                            <div class="faq-item faq-active">
                                <h3>Bagaimana cara kerjanya?</h3>
                                <div class="faq-content">
                                    <p>Kamu cukup isi form lalu kami proses sistem</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Berapa Ratenya?</h3>
                                <div class="faq-content">
                                    <p>Kami memberikan rate yang terjangkau dan bersaing</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Bagaimana jika ada kendala</h3>
                                <div class="faq-content">
                                    <p>Kamu bisa menghubungi kami melalui customer service
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- /Faq Section -->


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
        $(document).ready(function() {
            hitung();

            function hitung() {
                //hitung saat button di klik
                let dropdownValue = null;
                let textDropdown = null;
                $("#provider-pulsa").on('change', function() {
                    dropdownValue = parseFloat($(this).val());
                    textDropdown = $(this).find("option:selected").text();
                });

                //hitung dan append ke element
                $("#hitung-pulsa").click(function(e) {
                    e.preventDefault();
                    const pulseValueInput = $("#jumlah-pulsa-hitung").val();
                    if (textDropdown && dropdownValue) {
                        $("#provider-nama-id").html(textDropdown);
                        $("#rate-hitung").html(dropdownValue);

                        const result = pulseValueInput * dropdownValue;
                        console.log(pulseValueInput);

                        $("#hasil-hitung").html(result);
                        $("#hasil-hitung-pulsa").html(result);
                    } else {
                        alert("Silahkan pilih provider.");
                    }
                });
            }
        });
    </script>

</body>

</html>
