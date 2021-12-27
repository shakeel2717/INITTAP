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
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>

            <div class="cta d-none d-md-flex align-items-center">
                <a href="#about" class="scrollto">Get {{ env('APP_NAME') }} Card</a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <a href="index.html"><img src="{{ asset('assets/img/brand/logo-gold.svg') }}"
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
                                Once you receive your card, you can tap or scan your card to activate and create your
                                account. No application needed and it setup takes less than 2 minutes.

                                At the time of your order, we only need to know what to print on your card. Everything
                                else, you get to add to your account yourself at the time of activation of your
                                {{ env('APP_NAME') }}
                                account.
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
                        <p data-aos="fade-up">We are here to make your life easier by getting just one card for all your
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
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Our Mission</a></h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod
                                    tempor ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="card" style="background-image: url(landing/img/values-2.jpg);">
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Our Plan</a></h5>
                                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit
                                    voluptatem doloremque laudantium, totam rem.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card" style="background-image: url(landing/img/values-3.jpg);">
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Our Vision</a></h5>
                                <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut
                                    fugit, sed quia magni dolores.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card" style="background-image: url(landing/img/values-4.jpg);">
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Our Care</a></h5>
                                <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro
                                    quisquam laudantium voluptatem.</p>
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
                    <h2 data-aos="fade-up">Pricing</h2>
                    <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid
                        fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui
                        impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6" data-aos="fade-up">
                        <div class="box">
                            <h3>Free</h3>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li class="na">Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="box featured">
                            <h3>Business</h3>
                            <h4><sup>$</sup>19<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <h3>Developer</h3>
                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box">
                            <span class="advanced">Advanced</span>
                            <h3>Ultimate</h3>
                            <h4><sup>$</sup>49<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Frequently asked Questions</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                class="collapse" data-bs-target="#faq-list-1">What phones are compatible? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Between Tap or Scan feature, [] works with all modern smartphones.

                                    Tap function is compatible with NFC Technology enabled Smartphones

                                    iPhones made in 2018 and newer
                                    Most Android phones

                                    For all other phones, please have your client scan the QR code on the back of your
                                    card.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Can I design my InitTap Card? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Yes! We have an amazing graphic design team in-house that will ensure your logo and
                                    artwork translate perfectly into the card. Design your card here

                                    Shortly after you place your order, we will provide you with mockup designs to
                                    review and choose from. Please make sure you provide us with high quality files in
                                    Vector, Ai, PSD, EPS, PDF, or PNG for the best result possible.

                                    Design limitations:

                                    We can print Silver or Gold foil on matte black cards
                                    You can only design the front of your card
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">How to setup my card? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Once you receive your card, you can tap or scan your card to activate and create
                                    your account. No application needed and it setup takes less than 2 minutes.

                                    At the time of your order, we only need to know what to print on your card.
                                    Everything else, you get to add to your account yourself at the time of activation
                                    of your {{ env('APP_NAME') }} account.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">What is InitTap's privacy policy?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    We don’t ask our users for any sensitive information nor their social media logins.
                                    You can share as much or as little information as you’d like on your
                                    {{ env('APP_NAME') }} profile.
                                    {{ env('APP_NAME') }} profiles are public landing pages that hosts your
                                    information and make it
                                    easily sharable to people you meet.

                                    Read our Privacy Policy and Terms of Agreement
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">How does InitTap get the other
                                person's information? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Your profile comes with two main buttons for people to navigate to. In addition to
                                    your social accounts and contact details people can either Save your contact or
                                    Connect with you.

                                    Our connect feature allows people to quickly enter their name, email, and any other
                                    information they wish to share with you. We email their details to you and your
                                    detail to them.
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-6" class="collapsed">What material is InitTap Card? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    InitTap Card is made of durable and waterproof plastic. Our cards are sturdy and yet
                                    flexible. In addition, the matte finish adds a premium feel that is incomparable to
                                    most cards in the market today.
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-7" class="collapsed">How long is the shipping? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Orders are processed daily and shipping varies between 3-5 business days.

                                    For branded cards, add another 2-3 business days for us to create your design proof
                                    and the approval process.
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-8" class="collapsed">What is the return policy? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-8" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    You can get a full refund within 30 days of your purchase date. You don’t need to
                                    ship your card back to us, we will deactivate your InitTap card remotely.
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
                    <p data-aos="fade-up">If you have any questions, feel free to contact us. If you have any questions,
                        feel free to contact us..</p>
                </div>

                <div class="row justify-content-center">

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Taleex, Mogadishu, Somalia</p>
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
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
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
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Flexor</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-lg-flex py-4">

            <div class="me-lg-auto text-center text-lg-start">

            </div>
            <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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
