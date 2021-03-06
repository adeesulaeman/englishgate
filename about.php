<?php include 'includes/config.php';
  
  $cekLogin = false;
  if($user->is_logged_in()){ 
  	$cekLogin = true; 
  }


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>English Gate</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="css/cubeportfolio.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

<!-- Theme skin -->
<link id="t-colors" href="skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="wrapper">
	<!-- start header -->
	<header>	
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
                <?php if ($cekLogin) { ?> 
                	<div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="result.php">Result</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li class="dropdown">
							<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Account <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="user/logout.php">Logout</a></li>
								
                            </ul>				
						
						</li>
                    </ul>
                	</div>
                <?php } else { ?>
                	<div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                	</div>
            <?php    }
                ?>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="featured" class="bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<h2>About <span class="highlight">Us</span></h2>
					<hr>				
				</div>
			</div>		
		</div>
	</div>

		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<h4>About this Project</h4>
						<p>This project is dedicated to build the best education for all.</p>
					</div>
					<div class="col-sm-6 col-lg-6">
						<h4>Get in touch with us</h4>
						<p><strong>Esa Unggul University</strong></p>
						<p>Terusan Arjuna Street No.9, Kebon Jeruk, West Jakarta
						Indonesia</p>
						<p>Email for correspondence: <a href="mailto:noni@esaunggul.ac.id">noni@esaunggul.ac.id</a></p>

					</div>
				</div>
			</div>
		</div>
		</div>

		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-sm-12">
				<center>	<h4>Some images were taken from <a href="http://www.google.co.id"> google images</a></h4> </center>		
					</div>	
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

<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="plugins/flexslider/flexslider.config.js"></script>
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