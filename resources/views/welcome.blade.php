<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DIT - Department of Information Technology</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/dit_logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
    <!-- Navbar & Carousel Start -->
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
                    <a href="{{ route('welcome') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('aboutus') }}" class="nav-item nav-link">About</a>
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
                    <a href="contact.html" class="nav-item nav-link"></a>
                </div>
            </div>
        </nav>
    </div>
    <!--Header Image -->
    
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($slider as $sliders)
            @foreach(json_decode($sliders->images, true) as $index => $image)
                <div class="carousel-item {{ $loop->parent->first && $loop->first ? 'active' : '' }}">
                    <img class="w-100" src="{{ asset('storage/' . $image) }}" alt="{{ $sliders->name }}" class="slider-image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">{{ $sliders->description }}</h1>
                    
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <!--End Header Image -->
    </div>
    <!-- Navbar & Carousel End -->
    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0" style="margin-left: 300px;">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Students</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{ $studentCount }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                        <h5 class="text-primary mb-0">Staffs</h5>
                        <h1 class="mb-0" data-toggle="counter-up">{{ $staffCount }}</h1>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Facts Start -->

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
                    <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a>
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

    <!-- Service Start -->
    <!-- Service End -->

    <!-- Pricing Plan Start -->
    <!-- Pricing Plan End -->

    <!-- Staff View Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Department of Information Technology</h5>
                <h1 class="mb-0">Meet Our Skilled and Highly Trained Faculty Members</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                @foreach($staff as $staffs)
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{ asset('storage/' . $staffs->profile_image) }}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">{{ $staffs->name }}</h4>
                            <small class="text-uppercase">{{ $staffs->designation }}</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        {{ $staffs->description }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Staff View End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Stay Updated With DIT</h5>
                <h1 class="mb-0">Read The Latest News and Events from Our Post</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp">
                @foreach($events as $key => $event)
                    <div class="col-lg-10 wow slideInUp" data-wow-delay="{{ 0.3 * ($key + 1) }}s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                @if(!empty($event->images))
                                    @php
                                        $images = json_decode($event->images);
                                    @endphp
                                    @if(isset($images[0]))
                                        <img class="img-fluid" src="{{ asset('storage/' . $images[0]) }}" alt="">
                                    @endif
                                @endif
                                <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">{{ $event->highlight }}</a>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</small>
                                </div>
                                <h4 class="mb-3">{{ $event->title }}</h4>
                                <p>{{ $event->highlight }}</p>
                                <a class="text-uppercase" href="{{ route('events.show', $event->id) }}">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Start -->


    <!-- Vendor Start -->
   
    <!-- Vendor End -->
    

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
                                <p class="mb-0">csn.jnec@rub.edu.bt</p>
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
    <script src="lib/isotope/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="lib/lightbox/js/lightbox.min.js" type="text/javascript"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    $('#saveSocialMediaBtn').click(function() {
        $('#socialMediaForm').submit();
    });
</script>
        
</body>

</html>