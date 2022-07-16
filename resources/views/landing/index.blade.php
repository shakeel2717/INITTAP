<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('landing/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing/css/style.css?v=1.0.0') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:info@inittap.com">{{ env('APP_EMAIL') }}</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ env('APP_PHONE') }}</span></i>
            </div>

            <div class="cta d-none d-md-flex align-items-center">
                <a href="{{ route('register') }}" class="scrollto">Get {{ env('APP_NAME') }} Card</a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <a href="/"><img src="{{ asset('assets/brand/logo-light.svg') }}"
                        alt="{{ env('APP_NAME') }}" width="150" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Manage Your Profile</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('register') }}">Create Profile</a></li>
                    <li><a class="nav-link scrollto" href="#">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container" data-aos="fade-in">
            <h1>One Card for all Occassions</h1>
            <h2>Switch to InitTap Card to present a stronger image when meeting prospective clients.</h2>
            <div class="d-flex align-items-center">
                <i class="bx bxs-right-arrow-alt get-started-icon"></i>
                <a href="{{ route('register') }}" class="btn-get-started scrollto">Get Started</a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-xl-4 col-lg-5" data-aos="fade-up">
                        <div class="content">
                            <h3>How to setup my card?</h3>
                            <p>
                                No app required to setup {{ env('APP_NAME') }} card, register, place your order,
                                update your personal information
                            </p>
                            <div class="text-center">
                                <a href="{{ route('register') }}" class="more-btn">Get Started <i
                                        class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 d-flex">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-leaf"></i>
                                        <h4>Reduce environmental problem</h4>
                                        <p>Paper comprises 50% of business waste, 33% of municipal waste and 25% of
                                            waste going to landfill</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-id-card"></i>
                                        <h4>Provide smart and digital business card</h4>
                                        <p>You don't need to carry 100's of business cards to make contact with other
                                            people, use simple and smart INITTAP card</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="300">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Empower better business relationship</h4>
                                        <p>let your business stand out, smart things make difference</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative"
                        data-aos="fade-right">
                    </div>

                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h4 data-aos="fade-up">About us</h4>
                        <h3 data-aos="fade-up">Connect Smarter not Harder</h3>
                        <p data-aos="fade-up">We are here to make your life easier by getting just one card for all
                            your
                            occasions Create an engaging and memorable experience for the people you meet while saving
                            your contact information directly into their phone with Init Tap smart business card. Have
                            them remember you long after the meeting is over.</p>

                        <div class="icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bx bx-leaf"></i></div>
                            <h4 class="title"><a href="">Reduce environmental problem by eliminating paper
                                    business cards</a></h4>
                            <p class="description">Paper comprises 50% of business waste, 33% of municipal waste and
                                25% of waste going to landfill</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-id-card"></i></div>
                            <h4 class="title"><a href="">Provide smart and digital business card</a></h4>
                            <p class="description">You don't need to carry 100's of business cards to make contact
                                with other people, use simple and smart INITTAP card</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-receipt"></i></div>
                            <h4 class="title"><a href="">Empower better business relationship</a></h4>
                            <p class="description">let your business stand out, smart things make difference</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card" style="background-image: url(landing/img/values-1.jpg);">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title"><a href="">Metal Contactless Digital Business Card</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="card" style="background-image: url(landing/img/values-2.jpg);">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title"><a href="">Wooden Contactless Digital Business Cards</a>
                                </h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card" style="background-image: url(landing/img/values-3.jpg);">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title"><a href="">Contactless Digital Business Cards</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card" style="background-image: url(landing/img/values-4.jpg);">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title"><a href="">Personal or Corporation</a></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Values Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Create your INITTAP Card</h2>
                    <p data-aos="fade-up">Choose the Card that is right for your Business.</p>
                </div>

                <div class="row">
                    @forelse ($cards as $card)
                        <div class="col-lg-3 col-md-6 mt-4 mt-md-0 mx-auto" data-aos="fade-up" data-aos-delay="100">
                            <div class="box featured border border-primary">
                                <h3>{{ $card->title }}</h3>
                                <div class="card-image w-100 text-center">
                                    <img class="card-img-top"
                                        src="{{ asset('assets/cards/') }}/{{ $card->img }}" alt="">
                                </div>
                                <hr>
                                <h4><sup>$</sup>{{ $card->price }}<span></span></h4>
                                <ul>
                                    <div class="features ml-2 mb-3">
                                        @foreach ($card->features as $feature)
                                            <p class="card-text"><i class="tio-checkmark-circle text-success"></i>
                                                {{ $feature->value }}</p>
                                        @endforeach
                                    </div>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="{{ route('register') }}" class="btn-buy">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="card-text">No Card Found</h3>
                    @endforelse

                </div>
            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= corporate Section ======= -->
        <section id="corporate" class="corporate section-bg">
            <div class="container">

                <div class="row">
                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-5">
                        <h4 data-aos="fade-up">{{ env('APP_NAME') }} Card for Corporations</h4>
                        <h3 data-aos="fade-up">Open new Corporate Account</h3>
                        <p data-aos="fade-up">We are here to make your life easier by getting just one card for all
                            your
                            occasions Create an engaging and memorable experience for the people you meet while saving
                            your contact information directly into their phone with Init Tap smart business card. Have
                            them remember you long after the meeting is over.</p>

                        <div class="icon-box" data-aos="fade-up">
                            <div class="icon"><i class="bx bx-leaf"></i></div>
                            <h4 class="title"><a href="">Manage all Employees</a></h4>
                            <p class="description">Paper comprises 50% of business waste, 33% of municipal waste and
                                25% of waste going to landfill</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-id-card"></i></div>
                            <h4 class="title"><a href="">Create new Employee Card</a></h4>
                            <p class="description">You don't need to carry 100's of business cards to make contact
                                with other people, use simple and smart INITTAP card</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-receipt"></i></div>
                            <h4 class="title"><a href="">Manage Billing Reports</a></h4>
                            <p class="description">let your business stand out, smart things make difference</p>
                        </div>

                        <br>

                        <a href="{{ route('corporate.auth.create') }}" class="btn btn-lg btn-dark">Get Corporate
                            Account</a>

                    </div>
                    <div class="col-xl-5 col-lg-6 " data-aos="fade-right">
                        <img src="{{ asset('landing/corporate.jpg') }}" alt="">
                    </div>


                </div>

            </div>
        </section><!-- End corporate Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Frequently asked Questions</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Which phones are compatible? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    {{ env('APP_NAME') }} is comptabile with all smart phone with NFC Technology
                                    enabled, Iphone X and newer, most of samsung devices. if your phone don't support
                                    NFC please scan QR code
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Can I have my {{ env('APP_NAME') }}
                                Csutom designed Card? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    You can only design the front of your card, when placing your order, choose custom
                                    designed card then attach your design either as AI or PDF
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">What is the {{ env('APP_NAME') }}
                                privacy policy?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    We don't ask any sensitive information or their social media logins.
                                    {{ env('APP_NAME') }} stores only your public contact/social information and
                                    social media
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Contact Us</h2>
                    <p data-aos="fade-up">If you have any questions, feel free to contact us. If you have any
                        questions,
                        feel free to contact us..</p>
                </div>

                <div class="row justify-content-center">

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>{{ env('APP_ADDRESS') }}</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>{{ env('APP_EMAIL') }}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>{{ env('APP_PHONE') }}</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-xl-9 col-lg-12 mt-4">
                        <form action="{{ route('guest.form.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="my-3">
                                        <div class="Error">Error</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            @if (session('success'))
                                <div class="my-3">
                                    <div class="Error">Success</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">{{ session('success') }}</div>
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-theme btn-block my-3">Send
                                    Message</button>

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top border">
            <div class="container">
                <div class="row">
                    <div class="col-12 footer-contact text-center">
                        <a href="index.html"><img src="{{ asset('assets/brand/logo-dark.svg') }}"
                                alt="{{ env('APP_NAME') }}" width="150" class="img-fluid"></a>
                        <p class="footer-text mt-4">{{ env('APP_NAME') }} © {{ date('Y') }} All right reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing/js/main.js') }}"></script>

</body>

</html>
