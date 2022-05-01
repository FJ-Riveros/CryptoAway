<?php

// require_once "Class/Session.php";
// session_start();
// if (!empty($_SESSION)) header("Location: Modules/Timeline.php");
// $username = $_POST["username"] ?? "";
// $password = $_POST["password"] ?? "";

// //Login check
// if ($username != "" && $password != "") {
//     $session = Session::createSession();
//     if (!$session->tryToLogin($username, $password)) $loginIncorrecto = true;
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Englebert&display=swap" rel="stylesheet">

   
    <!-- <link rel="stylesheet" href="assets/css/plugins.css"> -->
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="./css/landing.css">
    

</head>
	

<body>

<!--<div class="fakeloader"></div>-->

<!-- Header -->
<header class="header">
   
    <div class="header-bottom-area header-sticky header-transparant">
        <div class="container">
            <div class="row no-gutters align-items-center">
               
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assets/images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-9 d-none d-lg-block">
                  
                    <div class="menu-area d-flex align-items-center justify-content-end">
                        <nav class="main-menu text-center">
                            <ul  class="sectionNav">
                                <li class="current"><a href="#home">HOME</a></li>
                                <li><a href="#offers">OFFERS</a></li>
                                <li><a href="#traveling">TRAVELING</a></li>
                                <li><a href="#testimonial">TESTIMONIAL</a></li>
                                <li><a href="#news">NEWS</a></li>
                                <li><a href="#contact">CONTACT</a></li>
                            </ul>
                        </nav><!--// main-menu -->
                    </div>
                </div>
                
                <!-- Show in small device Start -->
                <div class="clickable-menu clickable-mainmenu-active d-block d-lg-none col-md-6 col-6">
                    <a href="#"><i class="ti-menu"></i></a>
                </div>
                <div class="clickable-mainmenu">
                    <div class="clickable-mainmenu-icon">
                        <button class="clickable-mainmenu-close">
                            <span class="ti-close"></span>
                        </button>
                    </div>
                    
                    <div id="menu" class="text-left clickable-menu-style">
                        <ul  class="sectionNav">
                            <li class="current"><a href="#home">HOME</a></li>
                            <li><a href="#offers">OFFERS</a></li>
                            <li><a href="#traveling">TRAVELING</a></li>
                            <li><a href="#testimonial">TESTIMONIAL</a></li>
                            <li><a href="#news">NEWS</a></li>
                            <li><a href="#contact">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Show in small device End -->
            </div>
        </div>
    </div>
    
</header>
<!--// Header -->

<!-- Hero Section Start -->
<div class="hero-section section">

    <div class="hero-slider hero-slider-one">
        <!--Start Single Slider-->
        <div class="hero-slide-item d-flex image-bg align-items-center" style="background-image: url(https://demo.hasthemes.com/togoo/assets/images/hero/hero-1.jpg)">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 col-md-12">
                        <div class="hero-content-box">
                            <div class="hero-content text-center">
                                <h2>Travell</h2>
                                <h1>Different World</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna.</p>
                                <a href="#" class="btn btn-large btn-circle">BOOK TRAVELL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Single Slider-->
    </div>
    
</div><!-- Hero Section End -->

<!-- Page Conttent -->
<main class="page-content">
 
    <!-- Start Travel Offer -->
    <div class="travel-offer section-ptb" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <img src="assets/images/icon/title.png" alt="title shape">
                        <h2>Select Offers For Traveling</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod. </p>
                    </div>
                </div>
            </div>

            <div class="row mt--50">
                <div class="col-lg-12">
                    <div class="ht-tab-nab nav justify-content-center travel-tab" role="tablist">
                        <a class="nav-link active show" data-toggle="tab" href="#photoshop" role="tab">Bus Tour <img src="assets/images/icon/shape-1.png" alt="img"></a>
                        <a class="nav-link" data-toggle="tab" href="#art" role="tab">Food Tour <img src="assets/images/icon/shape-2.png" alt="img"></a>
                        <a class="nav-link" data-toggle="tab" href="#web" role="tab">Summer Tour <img src="assets/images/icon/shape-3.png" alt="img"></a>
                        <a class="nav-link" data-toggle="tab" href="#design" role="tab">Ship Tour <img src="assets/images/icon/shape-4.png" alt="img"></a>
                    </div>
                </div>
            </div>

            <div class=" tab-content">

                <!-- Start Single Tab -->
                <div class=" single-tab travel-tav-content tab-pane fade active show" id="photoshop" role="tabpanel">
                    <div class="travel-offer-form row">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="single-form ">
                                <select class="nice-select">
                                    <option>Country</option>
                                    <option>Bangla</option>
                                    <option>USA</option>
                                    <option>UK</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="single-form">
                            <select class="nice-select">
                                <option>Duration</option>
                                <option>Summer</option>
                                <option>Winter</option>
                                <option>Monsoon</option>
                                <option>Autumn</option>
                                <option>Late Autumn</option>
                                <option>Spring</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Date</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Min Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Max Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12 mt-30">
                            <div class="single-form">
                                <button><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- End Single Tab -->
                
                <!-- Start Single Tab -->
                <div class="row single-tab travel-tav-content tab-pane fade" id="art" role="tabpanel">
                    <div class="travel-offer-form row">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="single-form ">
                                <select class="nice-select">
                                    <option>Country</option>
                                    <option>Bangla</option>
                                    <option>USA</option>
                                    <option>UK</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="single-form">
                            <select class="nice-select">
                                <option>Duration</option>
                                <option>Summer</option>
                                <option>Winter</option>
                                <option>Monsoon</option>
                                <option>Autumn</option>
                                <option>Late Autumn</option>
                                <option>Spring</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Date</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Min Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Max Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12 mt-30">
                            <div class="single-form">
                                <button><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- End Single Tab -->

                <!-- Start Single Tab -->
                <div class="row single-tab travel-tav-content tab-pane fade" id="web" role="tabpanel">
                    <div class="travel-offer-form row">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="single-form ">
                                <select class="nice-select">
                                    <option>Country</option>
                                    <option>Bangla</option>
                                    <option>USA</option>
                                    <option>UK</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="single-form">
                            <select class="nice-select">
                                <option>Duration</option>
                                <option>Summer</option>
                                <option>Winter</option>
                                <option>Monsoon</option>
                                <option>Autumn</option>
                                <option>Late Autumn</option>
                                <option>Spring</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Date</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Min Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Max Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12 mt-30">
                            <div class="single-form">
                                <button><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- End Single Tab -->

                <!-- Start Single Tab -->
                <div class="row single-tab travel-tav-content tab-pane fade" id="design" role="tabpanel">
                    <div class="travel-offer-form row">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            <div class="single-form ">
                                <select class="nice-select">
                                    <option>Country</option>
                                    <option>Bangla</option>
                                    <option>USA</option>
                                    <option>UK</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="single-form">
                            <select class="nice-select">
                                <option>Duration</option>
                                <option>Summer</option>
                                <option>Winter</option>
                                <option>Monsoon</option>
                                <option>Autumn</option>
                                <option>Late Autumn</option>
                                <option>Spring</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Date</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                                <option>22/11/2018</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Min Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6  col-12">
                           <div class="single-form">
                            <select class="nice-select">
                                <option>Max Price</option>
                                <option>5000</option>
                                <option>6000</option>
                                <option>7000</option>
                                <option>8000</option>
                            </select>
                        </div>
                         </div>

                        <div class="col-lg-2 col-md-3 col-sm-6 col-12 mt-30">
                            <div class="single-form">
                                <button><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- End Single Tab -->

            </div>
        </div>
    </div>
    <!-- End Travel Offer -->
 
    <!-- Start Popular Tour -->
    <div class="travel-popular-tour section-ptb bg_image--01" id="traveling">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <img src="assets/images/icon/title.png" alt="title shape">
                        <h2>Select Offers For Traveling</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod. </p>
                    </div>
                </div>
            </div>
            <div class="row mt--30">
                <!-- Start Single Tour -->
                <div class="col-lg-4 col-sm-12 col-12 col-md-6">
                    <div class="pp-tour mb-30">   
                        <div class="thumb">
                            <a href="#">
                                <img src="assets/images/project/project-01.jpg" alt="popular tour">
                            </a>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h2>Frince <span class="offer-price">$1290</span></h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consec adipisicin elit sed do eiusmod tempor </p>
                            <div class="tp-tour-bottom">
                                <ul class="tp-meta">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> 4 Days</li>
                                    <li><i class="fa fa-user-o" aria-hidden="true"></i> 20+</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Tour -->
                <!-- Start Single Tour -->
                <div class="col-lg-4 col-sm-12 col-12 col-md-6">
                    <div class="pp-tour  mb-30">   
                        <div class="thumb">
                            <a href="#">
                                <img src="assets/images/project/project-02.jpg" alt="popular tour">
                            </a>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h2>Frince <span class="offer-price">$1290</span></h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consec adipisicin elit sed do eiusmod tempor </p>
                            <div class="tp-tour-bottom">
                                <ul class="tp-meta">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> 4 Days</li>
                                    <li><i class="fa fa-user-o" aria-hidden="true"></i> 20+</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Tour -->
                <!-- Start Single Tour -->
                <div class="col-lg-4 col-sm-12 col-12 col-md-6">
                    <div class="pp-tour  mb-30">   
                        <div class="thumb">
                            <a href="#">
                                <img src="assets/images/project/project-03.jpg" alt="popular tour">
                            </a>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h2>Frince <span class="offer-price">$1290</span></h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consec adipisicin elit sed do eiusmod tempor </p>
                            <div class="tp-tour-bottom">
                                <ul class="tp-meta">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> 4 Days</li>
                                    <li><i class="fa fa-user-o" aria-hidden="true"></i> 20+</li>
                                </ul>
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Tour -->
                <div class="col-lg-12">
                    <div class="tp-veiw-all-btn text-center">
                        <a href="#">VIEW ALL TOUR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Tour -->

    <!-- Start Flipbox Style-->
    <div class="section-flipbox section-pt section-pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <img src="assets/images/icon/title.png" alt="title shape">
                        <h2>Travelling Destinations</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod. </p>
                    </div>
                </div>
            </div>
            <div class="row mt--20">

                <!-- Start Single Flipbox -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="square-flip travel-flip">
                        <div class="square">
                            <div class="square-container">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                            </div>
                            <div class="flip-overlay-1"></div>
                        </div>

                        <div class="square2">
                            <div class="square-container2">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                                <p>There are many variations of passages Lorem Ipsum available, but the
                                    majority hav suffered alteration in.</p>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>

                    </div>
                </div>
                <!-- End Single Flipbox -->

                <!-- Start Single Flipbox -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="square-flip travel-flip">
                        <div class="square">
                            <div class="square-container">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                            </div>
                            <div class="flip-overlay-2"></div>
                        </div>

                        <div class="square2">
                            <div class="square-container2">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                                <p>There are many variations of passages Lorem Ipsum available, but the
                                    majority hav suffered alteration in.</p>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>

                    </div>
                </div>
                <!-- End Single Flipbox -->

                <!-- Start Single Flipbox -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="square-flip travel-flip">
                        <div class="square">
                            <div class="square-container">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                            </div>
                            <div class="flip-overlay-3"></div>
                        </div>

                        <div class="square2">
                            <div class="square-container2">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                                <p>There are many variations of passages Lorem Ipsum available, but the
                                    majority hav suffered alteration in.</p>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>

                    </div>
                </div>
                <!-- End Single Flipbox -->

                <!-- Start Single Flipbox -->
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="square-flip travel-flip">
                        <div class="square">
                            <div class="square-container">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                            </div>
                            <div class="flip-overlay-4"></div>
                        </div>

                        <div class="square2">
                            <div class="square-container2">
                                <h2>Sydney Harbour</h2>
                                <span>$150</span>
                                <p>There are many variations of passages Lorem Ipsum available, but the
                                    majority hav suffered alteration in.</p>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>

                    </div>
                </div>
                <!-- End Single Flipbox -->

            </div>
        </div>
    </div>
    <!-- End Flipbox Style-->
    
    <!-- Start Heading Style -->
    <div class="section-countdown section-ptb bg_image--02">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Start Single Countdown -->
                    <div class="countdown_wrapper travel-countdown text-center">
                        <div class="content">
                            <span>20% Off</span>
                            <h2>Special Tour in Janyary,In Venic <br> With <span>60+</span> Customers</h2>
                        </div>
                        <div class="box-timer countdown-style-1">
                            <div class="countbox timer-grid">
                                <div  data-countdown="2019/09/01"></div>
                            </div>
                        </div>
                        <div class="count-btn">
                            <a href="#">BOOKING THIS TOUR</a>
                        </div>
                    </div>
                    <!-- End Single Countdown -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Heading Style -->
    
    <!-- Start Newsletter Style -->
    <div class="section-newsletter section-ptb bg_image--03">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-wrapper newsletter-style-one white-newsletter">
                        <div class="title">
                            <h2>Updates and Promotional Events</h2>
                            <img src="assets/images/icon/newsletter-1.png" alt="shape">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minimol.</p>
                        </div>
                        <form action="#"  id="mc-form"  class="mc-form">
                            <div class="input-box">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter Your Email* ">
                                <button  id="mc-submit" type="submit">Subscribe</button>
                            </div>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Newsletter Style One -->
    
    <!-- Start Testimonial Style -->
    <div class="section-testimonial section-pt section-pb-90  bg_image--04" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-style-5 testimonial-slider-5 poss--relative">

                        <!-- Start Testimonial Nav -->
                        <div class="testimonal-nav5">

                            <div class="testimonal-img">
                                <img src="assets/images/testimoniail/01.png" alt="testimonal image">
                            </div>

                            <div class="testimonal-img">
                                <img src="assets/images/testimoniail/02.png" alt="testimonal image">
                            </div>

                            <div class="testimonal-img">
                                <img src="assets/images/testimoniail/03.png" alt="testimonal image">
                            </div>

                            <div class="testimonal-img">
                                <img src="assets/images/testimoniail/01.png" alt="testimonal image">
                            </div>


                        </div>
                        <!-- End Testimonial Nav -->

                        <!-- Start Testimonial For -->
                        <div class="testimonial-for5">

                            <div class="testimonial-desc">
                                <div class="triangle"></div>
                                <div class="client">
                                    <h6>Carolina Montoya</h6>
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco consectetur laboris nisi ut
                                    aliquip ex ea commodo consequat.</p>
                            </div>

                            <div class="testimonial-desc">
                                <div class="triangle"></div>
                                <div class="client">
                                    <h6>Carolina Montoya</h6>
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco consectetur laboris nisi ut
                                    aliquip ex ea commodo consequat.</p>
                            </div>

                            <div class="testimonial-desc">
                                <div class="triangle"></div>
                                <div class="client">
                                    <h6>Michelle Mitchell</h6>
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco consectetur laboris nisi ut
                                    aliquip ex ea commodo consequat.</p>
                            </div>

                            <div class="testimonial-desc">
                                <div class="triangle"></div>
                                <div class="client">
                                    <h6>Klaus Gruber</h6>
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco consectetur laboris nisi ut
                                    aliquip ex ea commodo consequat.</p>
                            </div>

                        </div>
                        <!-- End Testimonial For -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Style -->
    
    <!-- Start Post Carousel Style-->
    <div class="section-post-carousel section-ptb" id="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Latest News</h2>
                        <p>Lorem ipsum dolor sit amet, conse adipisi elit sed do eiusmod tem incididunt ut labore et dolore magna.</p>
                    </div>
                </div>
            </div>
            <div class="mt--50">
                <div class="row  post-carousel-wrapper post-carousel-active-5 carpenter-post-wrapper">
                    <div class="col-lg-12">

                        <!-- Start Single Post -->
                        <div class="post-carousel post-carousel-5 carpenter-post">
                            <div class="thumb">
                                <a href="#">
                                    <img src="assets/images/blog/thum-01.jpg" alt="elementor">
                                </a>
                            </div>
                            <div class="ptc-content">
                                <div class="content">
                                    <ul class="meta">
                                        <li><a href="#">Admin Name</a></li>
                                        <li>10 March 2020</li>
                                    </ul>
                                    <h2><a href="#">Contrary to popular belief. </a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius
                                        tempor incididu ut labore et dolore</p>
                                    <div class="post-btn">
                                        <a class="readmore-btn" href="#">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Post -->
                    </div>

                        
                    <div class="col-lg-12">
                        <!-- Start Single Post -->
                        <div class="post-carousel post-carousel-5 carpenter-post">
                            <div class="thumb">
                                <a href="#">
                                    <img src="assets/images/blog/thum-02.jpg" alt="elementor">
                                </a>
                            </div>
                            <div class="ptc-content">
                                <div class="content">
                                    <ul class="meta">
                                        <li><a href="#">Admin Name</a></li>
                                        <li>10 March 2020</li>
                                    </ul>
                                    <h2><a href="#">There are many variations.</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius
                                        tempor incididu ut labore et dolore</p>
                                    <div class="post-btn">
                                        <a class="readmore-btn" href="#">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Post -->
                    </div>

                    <div class="col-lg-12">
                        <!-- Start Single Post -->
                        <div class="post-carousel post-carousel-5 carpenter-post">
                            <div class="thumb">
                                <a href="#">
                                    <img src="assets/images/blog/thum-03.jpg" alt="elementor">
                                </a>
                            </div>
                            <div class="ptc-content">
                                <div class="content">
                                    <ul class="meta">
                                        <li><a href="#">Admin Name</a></li>
                                        <li>10 March 2020</li>
                                    </ul>
                                    <h2><a href="#">The standard chunk used.</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius
                                        tempor incididu ut labore et dolore</p>
                                    <div class="post-btn">
                                        <a class="readmore-btn" href="#">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Post -->
                    </div>

                    <div class="col-lg-12">
                        <!-- Start Single Post -->
                        <div class="post-carousel post-carousel-5 carpenter-post">
                            <div class="thumb">
                                <a href="#">
                                    <img src="assets/images/blog/thum-01.jpg" alt="elementor">
                                </a>
                            </div>
                            <div class="ptc-content">
                                <div class="content">
                                    <ul class="meta">
                                        <li><a href="#">Admin Name</a></li>
                                        <li>10 March 2020</li>
                                    </ul>
                                    <h2><a href="#">Lorem ipsum sit ame co.</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius
                                        tempor incididu ut labore et dolore</p>
                                    <div class="post-btn">
                                        <a class="readmore-btn" href="#">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Post -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Post Carousel  Style-->
    
    <!-- Start Contact Form Style -->
    <div class="section-contact section-ptb bg_image--9" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto col-md-12 col-12">
                    <div class="contact_form_container">
                        <div class="section-title-2">
                            <h2>Get In Touch</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                        </div>
                        <div class="form_wrapper form-style-6">
                            <form id="contact-form" action="http://hasthemes.com/file/mail.php">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input name="con_name" type="text" placeholder="Name*">
                                    </div>
                                    <div class="col-lg-6  col-md-6">
                                        <input type="text" placeholder="Subject*">
                                    </div>
                                    <div class="col-lg-12">
                                        <input  name="con_email" type="text" placeholder="Subject*">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea  name="con_message" name="message" placeholder="Your Massege*"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" value="SEND MESSAGE">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Form Style -->
    
</main>
<!--// Page Conttent -->

<!-- Footer -->
<footer class="footer">
    <div class="copyright section-ptb">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                   
                    <div class="copyright-left content text-center">
                        <div class="logo">
                            <img src="assets/images/logo/logo.png" alt="">
                        </div>
                        <p>Copyright © Togoo. All Right Reserved.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!--// Footer -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>