<?php
//include config
require_once('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
else { $userID = $_SESSION['loggedin']; }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ENGLISH GATE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/cubeportfolio.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link id="t-colors" href="skins/default.css" rel="stylesheet" />


	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />

<!-- =======================================================
    Theme Name: Sailor
    Theme URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
======================================================= -->

</head>
<body>



<div id="wrapper">

	<!-- start header -->
	<header>

						<div class="col-md-12">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search" title="Click to start searching"></span>
							</form>
						</div>
						</div>

        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" width="199" height="52" /></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="result.php">Result</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li class="dropdown">
							<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Account <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="user/logout.php">Logout</a></li>
								
                            </ul>				
						
						</li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Reading Section</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<h2><span class="highlight">READING</span></h2>					

				</div>
			</div>		
			<div class="col-lg-12">
			<div class="col-lg-12">			
			<hr>
			<center>
				<div id="grid-container" class="cbp-l-grid-projects">
					<ul>
						<li class="cbp-item web-design graphic">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="img/7.jpg" width="270px" height="180px" alt="" />
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
										
											<a href="answers.php?code=ReadingPeople" class="cbp-light cbp-l-caption-buttonRight" data-title="Events and  More<br>by Tiberiu Neamu">Assign</a>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="cbp-l-grid-projects-title">Events and More</div>
							<div class="cbp-l-grid-projects-desc">Web Design / Graphic</div> -->
						</li>
						<li class="cbp-item graphic">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="img/1.jpg" width="270px" height="180px" alt="" />
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a href="answers.php?code=ReadingAnimal" class="cbp-light cbp-l-caption-buttonRight">Assign</a>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="cbp-l-grid-projects-title">Animal</div>
							<div class="cbp-l-grid-projects-desc">Web Design / Graphic</div> -->
						</li>
						<li class="cbp-item web-design logo">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="img/2.jpg" width="270px" height="180px" alt="" />
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a href="answers.php?code=ReadingPlace" class="cbp-light cbp-l-caption-buttonRight" data-title="World Clock Widget<br>by Paul Flavius Nechita">Assign</a>
										</div>
									</div>
								</div>
							</div>
						<!-- 	<div class="cbp-l-grid-projects-title">World Clock Widget</div>
							<div class="cbp-l-grid-projects-desc">Logo / Web Design</div> -->
						</li>
						<li class="cbp-item graphic logo">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="img/3.jpg" width="270px" height="180px" alt="" />
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
										
											<a href="answers.php?code=ReadingThing" class="cbp-light cbp-l-caption-buttonRight" data-title="To-Do Dashboard<br>by Tiberiu Neamu">Assign</a>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="cbp-l-grid-projects-title">To-Do Dashboard</div>
							<div class="cbp-l-grid-projects-desc">Graphic / Logo</div> -->
						</li>
					</ul>
				</div>
				</center>
				</div>
			</div>
		</div>
	</div>
	</section>

	<footer>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>&copy; The Team - All Right Reserved</p>
                        <div class="credits">
                            <!-- 
                                All the links in the footer should remain intact. 
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Sailor
                            -->
                            <a href="#">Universitas Esa Unggul</a>
                        </div>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/stellar.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/jquery.cubeportfolio.min.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>


</body>
</html>