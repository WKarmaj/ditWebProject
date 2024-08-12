<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DIT - Department of Information Technology</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>csn.jnec@rub.edu.bt</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    @foreach($socialMediaLinks as $link)
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{ $link->link }}" target="_blank">
                        <i class="fab fa-{{ ($link->type) }} fw-normal"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <img src="img/dit_logo.png" style="max-width: 80px; max-height: 80px; width:auto; height:auto;" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('welcome') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('aboutus') }}" class="nav-item nav-link active">About</a>
                    <a href="{{ route('get.events') }}" class="nav-item nav-link">Events & News</a>
                    <a href="{{ route('faculty.profile') }}" class="nav-item nav-link ">Faculty</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Project</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('faculty.project') }}" class="dropdown-item">Faculty Project</a>
                            <a href="{{ route('csn.project') }}" class="dropdown-item">CSN Project</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Programme</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{route('dcsn.page')}}" class="dropdown-item">Computer System & Network</a>
                            <a href="{{route('DMA.page')}}" class="dropdown-item">Multimedia & Animation</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-dark py-5 " style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">About</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

     <!-- About Start -->
     <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0">{{ $aboutUs->main_points }}</h1>
                    </div>
                    <p class="mb-4">{{ $aboutUs->description }}</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Total Students: {{ $studentCount }}</h5>
                            
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staffs: {{ $staffCount }}</h5>
                         
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('storage/' . $aboutUs->image) }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
  
    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" >
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" >
                <h5 class="fw-bold text-primary text-uppercase">Our Vision</h5>
                @foreach($data as $vision)
                <h4 class="mb-3">{{ $vision->text }}</h4>
                @endforeach
            </div>
            <div class="container story position-relative">
                <div class="row mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12 text-md-center">
                        <div class="d-inline-block bg-primary text-white rounded py-2 px-4">Mission</div>
                    </div>
                </div>

                @foreach($missions as $key => $mission)
                    @if($key % 2 == 0)
                    <div class="row gx-5 story-right position-relative mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="col-md-6 text-md-end">
                            @foreach(json_decode($mission->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" style="max-width: 200px; max-height: 200px; width:auto; height:auto;" alt="">
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <div class="story-text position-relative d-inline-block bg-light p-4 ms-3 ms-md-0">
                                <h4>{{ $mission->keywords }}</h4>
                                <p class="m-0">{{ $mission->description }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row gx-5 story-left position-relative mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="col-md-6 text-md-end">
                            <div class="story-text position-relative d-inline-block bg-light p-4 ms-3 ms-md-0">
                                <h4>{{ $mission->keywords }}</h4>
                                <p class="m-0">{{ $mission->description }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-md-block">
                            @foreach(json_decode($mission->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" style="max-width: 200px; max-height: 200px; width:auto; height:auto;" alt="">
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.1s" >
                    <div class="col-12 text-md-center">
                        <div class="d-inline-block bg-primary text-white rounded py-2 px-4">By adhering to these principles, the department not only aims to produce quality IT professionals but also contributes towards the further development of the college and the university.</div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Quote End -->

      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-light p-4">
                    
                        <a href="index.html" class="navbar-brand">
                        <img src="img/logo-no-background.png" style="max-width: 250px; max-height: 250px; width:auto; height:auto;" alt="">
                        </a>
                       
                    </div>
                </div>
                <div class="col-lg-8 col-md-4">
                    <div class="row gx-5">
                        <div class="col-lg-8 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">JNEC,Dewathang, Samdrup Jongkhar District</p>
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
                                @foreach($socialMediaLinks as $link)
                                    <a class="btn btn-primary btn-square me-2" href="{{ $link->link }}" target="_blank"><i class="fab fa-{{ ($link->type) }} fw-normal"></i> </a>
                                @endforeach
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
                        <p class="mb-0">&copy; <a class="text-white border-bottom">Department of Information Technology</a>. All Rights Reserved. 
						
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
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>