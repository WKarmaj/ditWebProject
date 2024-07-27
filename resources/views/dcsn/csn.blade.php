<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DIT - Department of Information Technology</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- WOW.js -->

   

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
       .arrow-container {
            text-align: center;
            margin-top: 20px;
        }

        .arrow-container i {
            font-size: 24px;
            color: #000;
        }

        .subcontainer-content ol {
            padding-left: 20px;
        }

        .subcontainer {
            position: relative;
        }



    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

     <!-- Topbar Start -->
     <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>JNEC, Dewathang, Samdrup Jongkhar</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+975 17######</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/JnecDIT"  target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <img src="{{asset('img/dit_logo.png')}}" style="max-width: 80px; max-height: 80px; width:auto; height:auto;" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('welcome') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('aboutus') }}" class="nav-item nav-link ">About</a>
                    <a href="{{ route('get.events') }}" class="nav-item nav-link ">Events & News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Faculty</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('faculty.profile') }}" class="dropdown-item">About Faculty</a>
                            <a href="{{ route('faculty.project') }}" class="dropdown-item">Project & Research</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown">Programme</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{route('dcsn.page')}}" class="dropdown-item">Computer System & Network</a>
                            <a href="feature.html" class="dropdown-item">Multimedia & Animation</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-dark py-5 " style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Diploma in Computer System and Network </h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Programme</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
   <!-- Features Start -->
   <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <!-- About Programme -->
            <div class="row g-5">
                <!-- First Column (Left) -->
                <div class="col-lg-4">
                    <div class="row g-5">
                        @foreach($programmes->take($programmes->count() / 2) as $i => $programme)
                        <div class="col-12 wow zoomIn" data-wow-delay="{{ 0.2 + ($i * 0.4) }}s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <img src="{{ asset('storage/programmes/' . $programme->image) }}" style="width: 60px; height: 60px;">
                            </div>
                            <p class="mb-0">{{ $programme->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Center Image Column -->
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.9s" style="min-height: 450px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="{{ asset('img/dit_logo.png') }}" style="object-fit: cover;">
                    </div>
                </div>

                <!-- Third Column (Right) -->
                <div class="col-lg-4">
                    <div class="row g-5">
                        @foreach($programmes->skip($programmes->count() / 2) as $i => $programme)
                        <div class="col-12 wow zoomIn" data-wow-delay="{{ 0.4 + ($i * 0.4) }}s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <img src="{{ asset('storage/programmes/' . $programme->image) }}" style="width: 60px; height: 60px;">
                            </div>
                            <p class="mb-0">{{ $programme->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Container Section -->
            <div class="section-title text-center position-relative pb-3 mb-6 mx-auto" style="max-width: 600px; top: 50px;">
                <h5 class="fw-bold text-primary text-uppercase"></h5>
                <h1 class="fw-bold text-primary text-uppercase">Focus Area</h1>
            </div>
            <div class="row g-5 mt-5">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow-sm">
                        <img class="card-img-top" src="{{ asset('img/feature.jpg') }}" alt="Container 1">
                        <div class="card-body">
                            <h5 class="card-title">Network Administration</h5>
                            <!-- Subcontainer -->
                            <div class="subcontainer tree-root">
                                <div class="subcontainer-content">
                                    <ol>
                                        <li>Introduction to Networks</li>
                                        <li>Switching, Routing, and Wireless Essentials</li>
                                        <li>Structured Cabling</li>
                                        <li>Enterprise Networking, Security, and Automation</li>
                                        <li>Applied Network Security</li>
                                        <li>Ethical Hacking</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="arrow-container">
                        <i class="fa fa-arrow-down"></i>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="card h-100 border-0 shadow-sm">
                        <img class="card-img-top" src="{{ asset('img/feature.jpg') }}" alt="Container 2">
                        <div class="card-body">
                            <h5 class="card-title">System Design & Development</h5>
                            <!-- Subcontainer -->
                            <div class="subcontainer tree-root">
                                <div class="subcontainer-content">
                                    <ol>
                                        <li>Introduction to Networks</li>
                                        <li>Switching, Routing, and Wireless Essentials</li>
                                        <li>Structured Cabling</li>
                                        <li>Enterprise Networking, Security, and Automation</li>
                                        <li>Applied Network Security</li>
                                        <li>Ethical Hacking</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="arrow-container">
                        <i class="fa fa-arrow-down"></i>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.5s">
                    <div class="card h-100 border-0 shadow-sm">
                        <img class="card-img-top" src="{{ asset('img/feature.jpg') }}" alt="Container 3">
                        <div class="card-body">
                            <h5 class="card-title">System Administration</h5>
                            <!-- Subcontainer -->
                            <div class="subcontainer tree-root">
                                <div class="subcontainer-content">
                                    <ol>
                                        <li>Introduction to Networks</li>
                                        <li>Switching, Routing, and Wireless Essentials</li>
                                        <li>Structured Cabling</li>
                                        <li>Enterprise Networking, Security, and Automation</li>
                                        <li>Applied Network Security</li>
                                        <li>Ethical Hacking</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="arrow-container">
                        <i class="fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>

            <!-- Container End -->
            <div class="row g-6 mt-5">
                <div class="col-lg-10 wow zoomIn" data-wow-delay="0.1s" style="margin-left: 100px;">
                    <div class=" h-80 border-0 shadow-sm">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="{{ asset('img/feature.jpg') }}" style="object-fit: cover;">
                        </div>
                        <h5 class="card-title text-center">CPR201 Capstone Project</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>Startup</h1>
                        </a>
                        <p class="mt-3 mb-4">Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <button class="btn btn-dark">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street, New York, USA</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">info@example.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+012 345 67890</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Popular Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Your Site Name</a>. All Rights Reserved. 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    <script>
        new WOW().init();

    </script>
</body>

</html>