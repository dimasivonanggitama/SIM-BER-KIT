<!DOCTYPE html>
<html lang="en">
<script src="assets/js/autoScrollTo.js"></script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Antara Digital</title>

    <!-- Favicon -->
    <link rel="icon" href="" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="assets/vendors/animate/animate.css" rel="stylesheet">
    <!-- Icon CSS-->
	<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- Camera Slider -->
    <link rel="stylesheet" href="assets/vendors/camera-slider/camera.css">
    <!-- Owlcarousel CSS-->
	<link rel="stylesheet" type="text/css" href="assets/vendors/owl_carousel/owl.carousel.css" media="all">

    <!--Theme Styles CSS-->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Preloader -->
    <div class="preloader"></div>


	<!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <div class="searchForm">
                <form action="#" class="row m0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                        <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div><!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html" ><img src="assets/images/LogoAntara.png" alt="Logo Antara" ></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown submenu">
                            <a href="#" class="" onclick="return false;" onmousedown="resetScroller('Home');">Home</a>
                        </li>
                        <li class="dropdown submenu">
                            <a href='#' class="" onclick="return false;" onmousedown="autoScrollTo('Archiment');"onmouseup="resetScroller('Archiment');">Our Achievments</a>
                        </li>
                        <li class="dropdown submenu">
                            <a href='#' class="" onclick="return false;" onmousedown="autoScrollTo('about');"onmouseup="resetScroller('about');">About Us</a>
                        </li>

                        <li class="dropdown submenu">
                            <a href="#" class="" onclick="return false;" onmousedown="autoScrollTo('Service');"onmouseup="resetScroller('Service');">Services</a>

                        </li>
                        <li class="dropdown submenu"><a href="#" class="" onclick="return false;" onmousedown="autoScrollTo('Client');"onmouseup="resetScroller('Client');" >Our Client</a></li>
                        <li class="dropdown submenu">
                            <a href="#" class="" onclick="return false;" onmousedown="autoScrollTo('News');"onmouseup="resetScroller('News');">News</a>
                        </li>
                        <li class="dropdown submenu"><a href="#" class="" onclick="return false;" onmousedown="autoScrollTo('Contact');">Contact</a></li>
                        </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
	<!-- End Header_Area -->

    <!-- Slider area -->
    <section class="slider_area row m0" id='Home'>
        <div class="slider_inner">
            <div data-thumb="images/slider-1.jpg" data-src="assets/images/slider-1.jpg" >
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated"></h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s"></h3>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#"> </a>
                   </div>
                </div>
            </div>
            <div data-thumb="images/slider-2.jpg" data-src="assets/images/slider-2.jpg">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated"></h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s"></h3>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#"> </a>
                   </div>
                </div>
            </div>
            <div data-thumb="images/slider-3.jpg" data-src="assets/images/slider-3.jpg">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated"></h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s"></h3>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#"> </a>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Slider area -->

    <!-- Our Achievments Area -->

    <section class="our_achievments_area" data-stellar-background-ratio="0.3" id='Archiment'>
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Achievments</h2>
                <h4>Antara Digital</h4>
            </div>
            <div class="achievments_row row">
                <div class="col-md-4 col-sm-6 p0 completed">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <span class="counter">800</span>
                    <h6>Viewer</h6>
                </div>
                <div class="col-md-4 col-sm-6 p0 completed">
                    <i class="fa fa-desktop" aria-hidden="true"></i>
                    <span class="counter">230</span>
                    <h6>Videotron</h6>
                </div>
                <div class="col-md-4 col-sm-6 p0 completed">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="counter">125</span>
                    <h6>Home</h6>
                </div>
            </div>
        </div>
          <br><br><br><br>
    </section>

    <!-- End Our Achievments Area -->

    <!-- About Us Area -->

    <section class="about_us_area row"  id="about">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>ABOUT US</h2>
                <h4>Antara Digital</h4>
            </div>
            <div class="row about_row">
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                </div>
                    <H5> <p>Terobosan baru media luar ruang yang menyatukan layar informasi public dan komersial dalam satu layar.</p> </H5>

                </div>
                <div class="col-md-5 col-sm-6 about_client">
                    <img src="assets/images/about.png" alt="">
                </div>

            </div>

        </div>

    </section>
    <!-- End About Us Area -->
    <!-- Our Services Area -->
    <section class="our_services_area" id='Service'>
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Services</h2>
                <h4>Antara Digital</h4>
            </div>
            <div class="portfolio_inner_area">

                <div class="portfolio_item">
                   <div class="grid-sizer"></div>
                    <div class="single_facilities col-xs-4 p0 painting photography adversting">
                       <div class="single_facilities_inner">
                            <img src="assets/images/outdoor.jpg" alt="">
                            <a id="button"href="#popup">
                            <div class="gallery_hover" >


                            <h4>Outdoor</h4>


                            </div>
                            </a>

                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 p0 webdesign">
                       <div class="single_facilities_inner">
                            <img src="assets/images/indoor.jpg" alt="">
                            <a id="button"href="#popup">
                            <div class="gallery_hover" >


                            <h4>Indoor</h4>


                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="single_facilities col-xs-4 painting p0 photography branding">
                       <div class="single_facilities_inner">
                            <img src="assets/images/home.jpg" alt="">
                            <a id="button"href="#popup">
                            <div class="gallery_hover" >


                            <h4>Home</h4>


                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <br><br><br><br><br>
    </section>
    <!-- End Our Services Area -->

    <div id="popup">
    <div class="window">
              <a href="#services" class="close-button" title="Close">X</a>
              <h1>Jendela Pop Up</h1>
              <p>Ini adalah jendela Pop Up sederhana tanpa javasript<br/>
              Jendela ini dimunculkan oleh CSS<br/>
              Untuk menutup jendela ini, klik tombol close di kanan atas</p>
      </div>
      </div>
      <style>

      * {
    margin: 0;
    padding: 0;
    }

    body, html {
    font-family: Calibri, "times new roman", sans-serif;
    }

    #button {
    margin: 5% auto;
    width: 100px;
    text-align: center;
    position: center;
    }

    #button a {
    background-image: linear-gradient(to bottom,#fff,#fff);
    background-image: -o-linear-gradient(to bottom,#fff,#fff);
    background-image: -ms-linear-gradient(to bottom,#fff,#fff);
    background-image: -moz-linear-gradient(to bottom,#fff,#fff);
    background-image: -webkit-linear-gradient(to bottom,#fff,#fff);
    background-color: #fff;
    width: 86px;
    height: 30px;
    vertical-align: middle;
    padding: 10px;
    color: #fff;
    text-decoration: none;
    border: 1px solid transparent;
    border-radius: 5px;
    position: center;
    }

    #popup {
    width: 100%;
    height: 100%;
    position: fixed;
    background: rgba(0,0,0,.7);
    top: 0;
    left: 0;
    z-index: 9999;
    visibility: hidden;
    }

    .window {
    width: 400px;
    height: 100px;
    background: #fff;
    border-radius: 10px;
    position: relative;
    padding: 10px;
    box-shadow: 0 0 5px rgba(0,0,0,.4);
    text-align: center;
    margin: 15% auto;
    }

    .close-button {
    width: 20px;
    height: 20px;
    background: #000;
    border-radius: 50%;
    border: 3px solid #fff;
    display: block;
    text-align: center;
    color: #fff;
    text-decoration: none;
    position: absolute;
    top: -10px;
    right: -10px;
    }

    #popup:target {
    visibility: visible;
    }
      </style>

    <section class="our_partners_area" id='Client'>
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Client</h2>
                <h4>Antara Digital</h4>
            </div>
            <div class="partners">
                <div class="item"><img src="assets/images/client_logo/envato.jpg" alt=""></div>
                <div class="item"><img src="assets/images/client_logo/designmodo.jpg" alt=""></div>
                <div class="item"><img src="assets/images/client_logo/themeforest.jpg" alt=""></div>
                <div class="item"><img src="assets/images/client_logo/creative-market.jpg" alt=""></div>
                <div class="item"><img src="assets/images/client_logo/client_logo-1.png" alt=""></div>
            </div>
        </div>
          <br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>

        <!-- What ew offer Area -->
	<style>
		.movearea {
			position: relative;
		}
		
		.slick-slide {
    			margin: 0px 20px;
    			background:red;
		}

		.slick-slide img {
		    	width: 100%;
		}

		.slick-slider {
    			position: relative;
    			display: block;
    			box-sizing: border-box;
    			-webkit-user-select: none;
    			-moz-user-select: none;
    			-ms-user-select: none;
    			user-select: none;
    			-webkit-touch-callout: none;
    			-khtml-user-select: none;
    			-ms-touch-action: pan-y;
    			touch-action: pan-y;
    			-webkit-tap-highlight-color: transparent;
    			background:grey;
		}

		.slick-list {
    			position: relative;
    			display: block;
    			overflow: hidden;
    			margin: 0;
    			padding: 0;
		}
		.slick-list:focus {
    			outline: none;
		}
		.slick-list.dragging {
    			cursor: pointer;
    			cursor: hand;
		}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
	</style>
        <section class="what_we_area row" id='News'>
            <div class="container">
                <div class="tittle wow fadeInUp">
                  <h2><font color="#ffffff"><h1>News</h1></font></h2>
                  <h4>Antara Digital</h4>
                </div>
                <div class="row construction_iner" style="overflow:hidden">
                    	<div class="col-md-4 col-sm-6 construction">
			    <div class="movearea" id="obj1">
               			<div class="cns-img">
                       			<img src="assets/images/Antara.png" alt="">
               			</div>
              			<br>
                       		<div class="cns-content">
                            		<a href="#">News </a>
                            		<p>UJI COBA BERGERAK: Objek ke-1</p>
                       		</div>
                    	    </div>
                         </div>

                    <div class="col-md-4 col-sm-6 construction">
			<div class="movearea" id="obj2">
                    		<div class="cns-img">
                        		<img src="assets/images/Antara.png" alt="">
                       		</div>
                       		<br>
                       		<div class="cns-content">
					<a href="#">News 2</a>
                        		<p>UJI COBA BERGERAK: Objek ke-2</p>
                       		</div>
			</div>
		    </div>
                    <div class="col-md-4 col-sm-6 construction">
			<div class="movearea" id="obj3">
                       		<div class="cns-img">
                            		<img src="assets/images/Antara.png" alt="">

                       		</div>
                       		<br>
                       		<div class="cns-content">
                            		<a href="#">News 3</a>
                            		<p>UJI COBA BERGERAK: Objek ke-3</p>
                      		</div>
			</div>
                    </div>
                </div>
            </div>
              <br><br><br><br><br>
        </section>
	<script>
		var elem = document.getElementById("obj1");
		var elem2 = document.getElementById("obj2");
		var elem3 = document.getElementById("obj3");
		moveObj1();
  		function moveObj1() {
			var pos = 0;
			var pos3 = 0;
			var id = setInterval(frame, 5);
			function frame() {
  				if (pos == 800 & pos3 == -800) {
      					clearInterval(id);
					moveObj2();
  				} else {
	 				//start movement here!
  					pos++;
  					pos3--;
  					elem.style.left = pos + 'px'; 
  					elem3.style.left = pos3 + 'px'; 
				}
			}
		}
  		function moveObj2() {
			var pos = 800;
			var pos3 = -800;
			var id = setInterval(frame, 5);
			function frame() {
  				if (pos == 0 & pos3 == 0) {
      					clearInterval(id);
					moveObj1();
  				} else {
	 				//reverse!
  					pos--;
  					pos3++;
  					elem.style.left = pos + 'px'; 
  					elem3.style.left = pos3 + 'px'; 
				}
			}
		}
	</script>
		
        <!-- End What ew offer Area -->

        <!-- All contact Info -->
        <section class="all_contact_info" id='Contact'>
            <div class="container">
              <br><br><br><br><br>
              <center> <h2>Contact us</h2> </center>

                <div class="row contact_row">

                    <div class="col-sm-6 contact_info">
                        <h2>Contact Info</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        <div class="location">
                            <div class="location_laft">
                                <a class="f_location" href="#">location</a>
                                <a href="#">phone</a>
                                <a href="#">fax</a>
                                <a href="#">email</a>
                            </div>
                            <div class="address">
                                <a href="#">Sector # 10, Road # 05, Plot # 31, Uttara, <br> Dhaka 1230 </a>
                                <a href="#">+880 123 456 789</a>
                                <a href="#">(626) 935-3026</a>
                                <a href="#">info@thethemspro.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 contact_info send_message">
                        <h2>Send Us a Message</h2>
                        <form class="form-inline contact_box">
                            <input type="text" class="form-control input_box" placeholder="First Name *">
                            <input type="text" class="form-control input_box" placeholder="Last Name *">
                            <input type="text" class="form-control input_box" placeholder="Your Email *">
                            <input type="text" class="form-control input_box" placeholder="Subject">
                            <input type="text" class="form-control input_box" placeholder="Your Website">
                            <textarea class="form-control input_box" placeholder="Message"></textarea>
                            <button type="submit" class="btn btn-default">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End All contact Info -->

    <!-- Footer Area -->
    <footer class="footer_area">

        <div class="copyright_area">
            Copyright 2018 All rights reserved. Designed by <a href="#">Antara Digital</a>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- jQuery JS -->
    <script src="assets/js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Animate JS -->
    <script src="assets/vendors/animate/wow.min.js"></script>
    <!-- Camera Slider -->
    <script src="assets/vendors/camera-slider/jquery.easing.1.3.js"></script>
    <script src="assets/vendors/camera-slider/camera.min.js"></script>
    <!-- Isotope JS -->
    <script src="assets/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <!-- Progress JS -->
    <script src="assets/vendors/Counter-Up/jquery.counterup.min.js"></script>
    <script src="assets/vendors/Counter-Up/waypoints.min.js"></script>
    <!-- Owlcarousel JS -->
    <script src="assets/vendors/owl_carousel/owl.carousel.min.js"></script>
    <!-- Stellar JS -->
    <script src="assets/vendors/stellar/jquery.stellar.js"></script>
    <!-- Theme JS -->
    <script src="assets/js/theme.js"></script>


</body>
</html>
