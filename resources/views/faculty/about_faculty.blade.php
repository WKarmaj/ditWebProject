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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
   

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
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Faculty</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('faculty.profile') }}" class="dropdown-item">About Faculty</a>
                            <a href="detail.html" class="dropdown-item">Project & Research</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="price.html" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.html" class="dropdown-item">Our features</a>
                            <a href="team.html" class="dropdown-item">Team Members</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Free Quote</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
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
            <div class="col-md-4 text-center position-relative pb-3 mb-5 mx-auto">
                <div class="card user-card wow zoomIn" data-wow-delay="0.9s" style="border-top: none; box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05); transition: all 150ms linear;">
                    <div class="card-header" style="background-color: transparent; border-bottom: none; padding: 25px;">
                        <h5 class="fw-bold text-uppercase">Designation</h5>
                    </div>
                    <div class="card-block" style="text-align: center; padding: 25px;">
                        <div class="user-image" style="position: relative; margin: 0 auto; display: inline-block; padding: 5px; width: 110px; height: 110px;">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius" alt="User-Profile-Image" style="z-index: 20; position: absolute; top: 5px; left: 5px; width: 100px; height: 100px;">
                        </div>
                        <h6 class="fw-bold text-info text-uppercase">Tashi Wangchuk</h6>
                        <p class="text-muted" style="color: #919aa3 !important;">Active | Male | Born 23.05.1992</p>
                        <hr>
                        <p class="m-t-15 text-muted" style="margin-top: 15px; color: #919aa3 !important;">Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo..</p>
                        <ul class="list-unstyled activity-leval" style="padding-top: 0;">
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                        </ul>
                        <h5 class="fw-bold text-uppercase">Profieciency</h5>
                        <div class="bg-c-blue counter-block m-t-10 p-20" style="background: linear-gradient(45deg,#4099ff,#73b4ff); color: #fff; margin-top: 10px; padding: 20px;">
                            <div class="row">
                                <div class="col-6">
                                    <i class="fa fa-comment"></i>
                                    <p>Routing & Switching</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-user"></i>
                                    <p>Server Administration</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Network Security</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Ethical Hacking</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Digital Forensics</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Cisco Certified Network Associate(CCNA) instructor</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Programming</p>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row justify-content-center user-social-link">
                            <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook" style="color: #3B5997;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter" style="color: #42C0FB;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble" style="color: #EC4A89;"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="col-md-4">
                <div class="card user-card wow zoomIn" data-wow-delay="0.9s" style="border-top: none; box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05); transition: all 150ms linear;">
                    <div class="card-header" style="background-color: transparent; border-bottom: none; padding: 25px;">
                        <h5 class="fw-bold text-uppercase">Designation</h5>
                    </div>
                    <div class="card-block" style="text-align: center; padding: 25px;">
                        <div class="user-image" style="position: relative; margin: 0 auto; display: inline-block; padding: 5px; width: 110px; height: 110px;">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius" alt="User-Profile-Image" style="z-index: 20; position: absolute; top: 5px; left: 5px; width: 100px; height: 100px;">
                        </div>
                        <h6 class="fw-bold text-info text-uppercase">Tashi Wangchuk</h6>
                        <p class="text-muted" style="color: #919aa3 !important;">Active | Male | Born 23.05.1992</p>
                        <hr>
                        <p class="m-t-15 text-muted" style="margin-top: 15px; color: #919aa3 !important;">Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo..</p>
                        <ul class="list-unstyled activity-leval" style="padding-top: 0;">
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                        </ul>
                        <h5 class="fw-bold text-uppercase">Profieciency</h5>
                        <div class="bg-c-blue counter-block m-t-10 p-20" style="background: linear-gradient(45deg,#4099ff,#73b4ff); color: #fff; margin-top: 10px; padding: 20px;">
                            <div class="row">
                                <div class="col-6">
                                    <i class="fa fa-comment"></i>
                                    <p>Routing & Switching</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-user"></i>
                                    <p>Server Administration</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Network Security</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Ethical Hacking</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Digital Forensics</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Cisco Certified Network Associate(CCNA) instructor</p>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-suitcase"></i>
                                    <p>Programming</p>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row justify-content-center user-social-link">
                            <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook" style="color: #3B5997;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter" style="color: #42C0FB;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble" style="color: #EC4A89;"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card user-card" style="border-top: none; box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05); transition: all 150ms linear;">
                    <div class="card-header" style="background-color: transparent; border-bottom: none; padding: 25px;">
                        <h5 class="fw-bold text-uppercase">Designation</h5>
                    </div>
                    <div class="card-block" style="text-align: center; padding: 25px;">
                        <div class="user-image" style="position: relative; margin: 0 auto; display: inline-block; padding: 5px; width: 110px; height: 110px;">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-radius" alt="User-Profile-Image" style="z-index: 20; position: absolute; top: 5px; left: 5px; width: 100px; height: 100px;">
                        </div>
                        <h6 class="fw-bold text-info text-uppercase">Karma Jigme Wangchuk</h6>
                        <p class="text-muted" style="color: #919aa3 !important;">Active | Male | Born 23.05.1992</p>
                        <hr>
                        <p class="text-muted m-t-15" style="color: #919aa3 !important; margin-top: 15px;">Activity Level: 87%</p>
                        <ul class="list-unstyled activity-leval" style="padding-top: 0;">
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #ccc;"></li>
                            <li style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #ccc;"></li>
                        </ul>
                        <div class="bg-c-green counter-block m-t-10 p-20" style="background: linear-gradient(45deg,#2ed8b6,#59e0c5); color: #fff; margin-top: 10px; padding: 20px;">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa fa-comment"></i>
                                    <p>1256</p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user"></i>
                                    <p>8562</p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-suitcase"></i>
                                    <p>189</p>
                                </div>
                            </div>
                        </div>
                        <p class="m-t-15 text-muted" style="margin-top: 15px; color: #919aa3 !important;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <hr>
                        <div class="row justify-content-center user-social-link">
                            <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook" style="color: #3B5997;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter" style="color: #42C0FB;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble" style="color: #EC4A89;"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card user-card" style="border-top: none; box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05); transition: all 150ms linear;">
                    <div class="card-header" style="background-color: transparent; border-bottom: none; padding: 25px;">
                        <h5 class="fw-bold text-uppercase">Designation</h5>
                    </div>
                    <div class="card-block" style="text-align: center; padding: 25px;">
                        <div class="user-image" style="position: relative; margin: 0 auto; display: inline-block; padding: 5px; width: 110px; height: 110px;">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-radius" alt="User-Profile-Image" style="z-index: 20; position: absolute; top: 5px; left: 5px; width: 100px; height: 100px;">
                        </div>
                        <h6 class="fw-bold text-info text-uppercase">Alessa Robert</h6>
                        <p class="text-muted" style="color: #919aa3 !important;">Active | Male | Born 23.05.1992</p>
                        <hr>
                        <p class="text-muted m-t-15" style="color: #919aa3 !important; margin-top: 15px;">Activity Level: 87%</p>
                        <ul class="list-unstyled activity-leval" style="padding-top: 0;">
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li class="active" style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #2ed8b6;"></li>
                            <li style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #ccc; "></li>
                            <li style="display: inline-block; width: 15%; height: 4px; margin: 0 3px; background-color: #ccc;"></li>
                        </ul>
                        <div class="bg-c-yellow counter-block m-t-10 p-20" style="background: linear-gradient(45deg,#FFB64D,#ffcb80); color: #fff; margin-top: 10px; padding: 20px;">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa fa-comment"></i>
                                    <p>1256</p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user"></i>
                                    <p>8562</p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-suitcase"></i>
                                    <p>189</p>
                                </div>
                            </div>
                        </div>
                        <p class="m-t-15 text-muted" style="margin-top: 15px; color: #919aa3 !important;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <hr>
                        <div class="row justify-content-center user-social-link">
                            <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook" style="color: #3B5997;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter" style="color: #42C0FB;"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble" style="color: #EC4A89;"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>