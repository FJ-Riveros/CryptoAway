<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/helpers/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/jquery.timepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts/flaticon/font/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts/icomoon/icomoon.ttf') }}">
        <link rel="stylesheet" href="{{ asset('css/helpers/style.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('css/build/landing.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	        <div class="container">
	          <a class="navbar-brand" href="index.html">CryptoAway<span>Travel with Crypto!</span></a>
	          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="oi oi-menu"></span> Menu
	          </button>
	          <div class="collapse navbar-collapse" id="ftco-nav">
	            <ul class="navbar-nav ml-auto">
	              <li class="nav-item active"><a href="#main_section" class="nav-link">Home</a></li>
	              <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
	              <li class="nav-item"><a href="#destination" class="nav-link">Destination</a></li>
	              <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                  @auth
                        <li class="nav-item cta">
                            <form method="POST" action="{{ route('logout') }} " class="nav-link">
                                @csrf
                                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Log Out') }}
                                </button>
                            </form>

        	            <!-- <a href="{{ route('logout') }}" class="nav-link">Logout</a> -->

                        </li>
                    @else
        	            <li class="nav-item cta"><a href="{{ route('login') }}" class="nav-link">Login</a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class=" nav-link">Register</a></li>
                        @endif
                    @endauth
	              <!-- <li class="nav-item cta"><a href="{{ route('login') }}" class="nav-link">Login</a></li> -->
	            </ul>
	          </div>
	        </div>
	      </nav>
       

        <div class="hero-wrap js-fullheight" style="background-image: url('../img/maldives.jpg');" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div id="main_section" class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
              <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of the world, without going around in circles</p>
                <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Make your amazin trip with us</h1>
                <a class="lading__button" href="login">Get started!</a>
              </div>
            </div>
          </div>
        </div>
        <section class="ftco-section services-section bg-light d-flex align-items-center min-vh-100" id="about">
          <div class="container">
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
              	<div class="row">
              		<div class="col-md-6 d-flex align-self-stretch ftco-animate text-center">
	    	            <div class="media block-6 services d-block">
	    	              <div class="icon"><span class="flaticon-paragliding"></span></div>
	    	              <div class="media-body">
	    	                <h3 class="heading mb-3">Activities</h3>
	    	                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
	    	              </div>
	    	            </div>      
	    	          </div>
	    	          <div class="col-md-6 d-flex align-self-stretch ftco-animate text-center">
	    	            <div class="media block-6 services d-block">
	    	              <div class="icon"><span class="flaticon-route"></span></div>
	    	              <div class="media-body">
	    	                <h3 class="heading mb-3">Travel Arrangements</h3>
	    	                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
	    	              </div>
	    	            </div>    
	    	          </div>
	    	          <div class="col-md-6 d-flex align-self-stretch ftco-animate text-center">
	    	            <div class="media block-6 services d-block">
	    	              <div class="icon"><span class="flaticon-tour-guide"></span></div>
	    	              <div class="media-body">
	    	                <h3 class="heading mb-3">Private Guide</h3>
	    	                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
	    	              </div>
	    	            </div>      
	    	          </div>
	    	          <div class="col-md-6 d-flex align-self-stretch ftco-animate text-center">
	    	            <div class="media block-6 services d-block">
	    	              <div class="icon"><span class="flaticon-map"></span></div>
	    	              <div class="media-body">
	    	                <h3 class="heading mb-3">Location Manager</h3>
	    	                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
	    	              </div>
	    	            </div>      
	    	          </div>
	    			  <div class="col-md-12 heading-section ftco-animate text-center">
              			<h2 class="mb-4 text-center">It's time to start your adventure</h2>
              		  	<p class="text-center" ><a href="login" class="lading__button">Search Destination</a></p>
              		  </div>
              	</div>
              </div>
            </div>
          </div>
        </section>
        <section class="ftco-counter vh-100 img" id="section-counter">
        	<div class="container">
        		<div class="row d-flex">
        			<div class="col-md-4 d-flex">
	    				<div class="hero-wrap js-fullheight" style="background-image: url(img/italy.jpg);" data-stellar-background-ratio="0.5"></div>
	    			</div>
        			<div class="col-md-4 py-5 d-flex align-items-center">
        				<div class="row justify-content-start pb-3">
	    	          		<div class="col-md-12 heading-section ftco-animate">
	    	            		<h2 class="mb-4 text-center">Make Your Tour Memorable and Safe With Us</h2>
	    	            		<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid laborum quisquam vero quasi reiciendis molestias quod dolores magni iure consequatur, optio voluptatum odit perferendis accusantium! Natus alias est voluptatum reiciendis.
	    						Qui tempora fugiat culpa ea?</p>
	    						<div class="row">
	    	          				<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
	    	          				  <div class="block-18 text-center mb-4">
	    	          				    <div class="text">
	    	          				      <strong class="number" data-number="250">0</strong>
	    	          				      <span>Completed Tours</span>
	    	          				    </div>
	    	          				  </div>
	    	          				</div>
	    	          				<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
	    	          				  <div class="block-18 text-center mb-4">
	    	          				    <div class="text">
	    	          				      <strong class="number" data-number="15000">0</strong>
	    	          				      <span>User Interactions</span>
	    	          				    </div>
	    	          				  </div>
	    	          				</div>
	    	          				<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
	    	          				  <div class="block-18 text-center mb-4">
	    	          				    <div class="text">
	    	          				      <strong class="number" data-number="110">0</strong>
	    	          				      <span>Total Countries</span>
	    	          				    </div>
	    	          				  </div>
	    	          				</div>
	    	        			</div>
	    	          		</div>
	    	        	</div>
	    			</div>
	    			<div class="col-md-4 d-flex">
	    				<div class="hero-wrap js-fullheight" style="background-image: url(img/national_park.jpg);" data-stellar-background-ratio="0.5"></div>
	    			</div>
	            </div>
            </div>
        	</div>
        </section>
	    	<section id="destination" class="ftco-section">
        	<div class="container">
        		<div class="row justify-content-center pb-4">
              <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Best Destinations!</h2>
              </div>
            </div>
            <div class="row">
            	<div class="col-md-3 ftco-animate">
            		<div class="project-destination">
            			<a href="#" class="img" style="background-image: url(img/Vietnam.jpg);">
            				<div class="text">
            					<h3>Vietnam</h3>
            				</div>
            			</a>
            		</div>
            	</div>
            	<div class="col-md-3 ftco-animate">
            		<div class="project-destination">
            			<a href="#" class="img" style="background-image: url(img/Japan.jpg);">
            				<div class="text">
            					<h3>Japan</h3>
            				</div>
            			</a>
            		</div>
            	</div>
            	<div class="col-md-3 ftco-animate">
            		<div class="project-destination">
            			<a href="#" class="img" style="background-image: url(img/place-3.jpg);">
            				<div class="text">
            					<h3>Thailand</h3>
            				</div>
            			</a>
            		</div>
            	</div>
            	<div class="col-md-3 ftco-animate">
            		<div class="project-destination">
	    			<a href="#" class="img" style="background-image: url(img/Italy-mountains.jpg);">
            				<div class="text">
            					<h3>Italy</h3>
            				</div>
            			</a>
            		</div>
            	</div>
            </div>
        	</div>
        </section>
        <section class="ftco-section testimony-section bg-bottom hero-wrap " style="background-image: url(img/journey.jpg);"  data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row justify-content-center pb-4">
              <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-4 text-white">Users Feedback</h2>
              </div>
            </div>
            <div class="row ftco-animate">
              <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                  <div class="item">
                    <div class="testimony-wrap py-4">
                      <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                        	<div class="user-img" style="background-image: url(https://cdn.pixabay.com/photo/2018/04/27/08/55/water-3354062__340.jpg)"></div>
                        	<div class="pl-3">
	    	                    <p class="name">Mark Stevens</p>
	    	                    <span class="position">Traveler</span>
	    	                  </div>
	                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4">
                      <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                        	<div class="user-img" style="background-image: url(https://cdn.pixabay.com/photo/2017/08/06/12/06/people-2591874__340.jpg)"></div>
                        	<div class="pl-3">
	    	                    <p class="name">Anna Blair</p>
	    	                    <span class="position">Accountant</span>
	    	                  </div>
	                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4">
                      <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                        	<div class="user-img" style="background-image: url(https://cdn.pixabay.com/photo/2016/11/19/15/49/woman-1839998__340.jpg); background-position: left"></div>
                        	<div class="pl-3">
	    	                    <p class="name">Carla Sins</p>
	    	                    <span class="position">Photographer</span>
	    	                  </div>
	                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4">
                      <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                        	<div class="user-img" style="background-image: url(img/person_1.jpg)"></div>
                        	<div class="pl-3">
	    	                    <p class="name">Bryan Wrynn</p>
	    	                    <span class="position">Firefighter</span>
	    	                  </div>
	                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimony-wrap py-4">
                      <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                        	<div class="user-img" style="background-image: url(img/person_2.jpg)"></div>
                        	<div class="pl-3">
	    	                    <p class="name">Roger Scott</p>
	    	                    <span class="position">Marketing Manager</span>
	    	                  </div>
	                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <footer id="contact" class="bg-bottom bg-white">
            <div class="container">
	    		<div class="row mt-4">
	    			<div class="ml-auto col-lg-5 col-md-6 col-12">
	    				<h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Feel free to ask anything</h2>
	    				<form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
	    					<input type="text" class="form-control" name="cf-name" placeholder="Name">
	    					<input type="email" class="form-control " name="cf-email" placeholder="Email">
	    					<textarea class="form-control " rows="5" name="cf-message" placeholder="Message"></textarea>
	    					<button type="submit" class="w-100" id="submit-button" name="submit">Send Message</button>
	    				</form>
	    			</div>
	    			<div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
	    				<h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Where you can <span>find us</span></h2>
	    				<p data-aos="fade-up" data-aos-delay="800"><i class="fa-solid fa-location-dot mr-1"></i>Frederick Terman Street, 3 29590 Málaga, Spain</p>
	    				<div class="google-map" data-aos="fade-up" data-aos-delay="900">
	    				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696.0974942074547!2d-4.555483546224307!3d36.740719390117164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f1d06d8246c9%3A0xb6dccfba3e65a1f2!2sFP%20IES%20Campanillas%20PTA!5e1!3m2!1ses!2ses!4v1652297987451!5m2!1ses!2ses" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
	    				</div>
	    			</div>
	    		</div>
    
                   <div class="row contact-info mt-4">
                        <div class="ml-auto col-lg-4 col-md-5">
                            <p class="copyright-text">Copyright &copy; 2022 CryptoAway Co.
                        </div>
                        <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                            <p class="mr-4">
	    						<span class="icon icon-envelope" ></span>
                                <a href="#">info@CryptoAway.co</a>
                            </p>
                            <p><i class="fa fa-phone mr-1"></i> +34 655 245 431</p>
                        </div>

                   </div>
	    		   </div>
            </div>
        </footer>
	  
        <script src="{{ asset('js/helpers/jquery.min.js') }}"></script>
        <script src="{{ asset('js/helpers/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('js/helpers/popper.min.js') }}"></script>
        <script src="{{ asset('js/helpers/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/helpers/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('js/helpers/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('js/helpers/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('js/helpers/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/helpers/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/helpers/aos.js') }}"></script>
        <script src="{{ asset('js/helpers/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ asset('js/helpers/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/helpers/scrollax.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('js/helpers/google-map.js') }}"></script>
        <script src="{{ asset('js/helpers/main.js') }}"></script>
    </body>
</html>
