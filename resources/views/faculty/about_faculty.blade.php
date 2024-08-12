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


   

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
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
                    <a href="{{ route('faculty.profile') }}" class="nav-item nav-link active">Faculty</a>
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
                            <a href="feature.html" class="dropdown-item">Multimedia & Animation</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-dark py-5 " style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Meet our Skilled Faculty</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Faculty Profile</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- HoD -->
    <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h3 class="mb-0">Head of the Department</h3>
            </div>
        </div> 
    </div>
    <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.2s">
        <div class="row g-5">
            @foreach($hodStaff as $staff)
                <div class="col-md-4 text-center position-relative pb-3 mb-5 mx-auto">
                    <div class="card user-card wow zoomIn" data-wow-delay="0.9s" style="border-top: none; box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05); transition: all 150ms linear;">
                        <div class="card-header" style="background-color: transparent; border-bottom: none; padding: 25px;">
                            <h5 class="fw-bold text-uppercase">{{ $staff->designation }}</h5>
                        </div>
                        <div class="card-block" style="text-align: center; padding: 25px;">
                            <div class="user-image" style="position: relative; margin: 0 auto; display: inline-block; padding: 5px; width: 210px; height: 210px;">
                                <img src="{{ asset('storage/' . $staff->profile_image) }}" class="img-radius" alt="User-Profile-Image" style="z-index: 20; position: absolute; top: 5px; left: 5px; width: 200px; height: 200px;">
                            </div>
                            <h6 class="fw-bold text-info text-uppercase">{{ $staff->name }}</h6>
                            
                            <hr>
                            <p class="m-t-15 text-muted" style="margin-top: 15px; color: #919aa3 !important;">{{ $staff->description }}</p>
                            <ul class="list-unstyled activity-leval" style="padding-top: 0;">
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            </ul>
                            <h5 class="fw-bold text-uppercase">Proficiency</h5>
                            <div class="bg-c-blue counter-block m-t-10 p-20" style="background: linear-gradient(45deg,#4099ff,#73b4ff); color: #fff; margin-top: 10px; padding: 20px;">
                                <div class="row">
                                    @if ($staff->skills)
                                        @foreach (json_decode($staff->skills, true) as $skill)
                                            <div class="col-6">
                                                <p>{{ $skill['name'] }}</p>
                                                <img src="{{ asset('storage/' . $skill['image']) }}" alt="{{ $skill['name'] }} image" style="width: 50px; height: 50px;">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p>No skills added.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-center user-social-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h3 class="mb-0">Faculty Members</h3>
            </div>
        </div> 
    </div>
    <!-- Staff Profile -->
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.2s">
        <div class="row g-5">
            @foreach($facultyStaff as $staff)
                <div class="col-md-4">
                    <div class="card user-card wow zoomIn" data-wow-delay="0.9s" style="border-top: none; box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05); transition: all 150ms linear;">
                        <div class="card-header" style="background-color: transparent; border-bottom: none; padding: 25px;">
                            <h5 class="fw-bold text-uppercase">{{ $staff->designation }}</h5>
                        </div>
                        <div class="card-block" style="text-align: center; padding: 25px;">
                            <div class="user-image" style="position: relative; margin: 0 auto; display: inline-block; padding: 5px; width: 210px; height: 210px;">
                                <img src="{{ asset('storage/' . $staff->profile_image) }}" class="img-radius" alt="User-Profile-Image" style="z-index: 20; position: absolute; top: 5px; left: 5px; width: 200px; height: 200px;">
                            </div>
                            <h6 class="fw-bold text-info text-uppercase">{{ $staff->name }}</h6>
                         
                            <hr>
                            <p class="m-t-15 text-muted" style="margin-top: 15px; color: #919aa3 !important;">{{ $staff->description }}</p>
                            <ul class="list-unstyled activity-leval" style="padding-top: 0;">
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                                <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            </ul>
                            <h5 class="fw-bold text-uppercase">Proficiency</h5>
                            <div class="bg-c-blue counter-block m-t-10 p-20" style="background: linear-gradient(45deg,#4099ff,#73b4ff); color: #fff; margin-top: 10px; padding: 20px;">
                                <div class="row">
                                    @if ($staff->skills)
                                        @foreach (json_decode($staff->skills, true) as $skill)
                                            <div class="col-6">
                                               
                                                <p>{{ $skill['name'] }}</p>
                                                <img src="{{ asset('storage/' . $skill['image']) }}" alt="{{ $skill['name'] }} image" style="width: 50px; height: 50px;">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <p>No skills added.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-center user-social-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


     <!-- Footer Start -->
     <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-light p-4">
                    
                        <a href="index.html" class="navbar-brand">
                        <img src="{{asset('img/logo-no-background.png')}}" style="max-width: 250px; max-height: 250px; width:auto; height:auto;" alt="">
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
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>