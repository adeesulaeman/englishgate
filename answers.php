<?php //include config
require_once('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
else { $userID = $_SESSION['loggedin']; }
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
<?php 
  $option = "";
  try {
  	  $stmt = $db->prepare('SELECT * FROM tbl_question WHERE code_question = :code_question') ;
      $stmt->execute(array(':code_question' => $_GET['code']));
      $row = $stmt->fetch();

      } catch(PDOException $e) {
        echo $e->getMessage();
    }
      $option = $row['option_question'];
      $type = $row['type_question'];
      $code_question = $row['code_question'];
      $code = $_GET['code'];
      $media = $row['media_question'];
      $no = 1;
      
      try {
  	  $stmt6 = $db->prepare('SELECT * FROM process') ;
      $stmt6->execute(array());
      while($row6 = $stmt6->fetch()){
      	if ($row6['userID'] == $userID && $row6['code_question'] == $code) { 
			header('Location: result.php?note=finished');
		} }
      

      } catch(PDOException $e) {
        echo $e->getMessage();
    }
  ?>

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
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="result.php">Result</a></li>
                        <li><a href="about.php">Contact</a></li>
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
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li><a href="<?php echo strtolower($type); ?>.php">Answer</a><i class="icon-angle-right"></i></li>
					<li class="active"><?php echo $type; ?></li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-10">
				
				<?php if (!$media == NULL) { ?>
							<div class="panel-body">
		  					<object width="1200px" height="550px" data="user/<?php echo $media; ?>"></object>
		  				</div>
				<?php }
				?>


				<div class="row">
					<div class="col-lg-12">
						<h3>Question</h3>
					<form class="form-inline" role="form" method="post">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-briefcase"></i>Number 1</a></li>
						<?php
							for ($i = 2; $i < 6; $i++) { ?>
								<li><a href="#tab<?php echo $i; ?>" data-toggle="tab">Number <?php echo $i; ?></a></li>
						<?php	}
						 ?>	
						</ul>
						<div class="tab-content">
								<?php
										if ($option == 'Essai') {
												$stmt1 = $db->prepare('SELECT * FROM essai WHERE code_question = :code_question ORDER BY id_essai ASC');
										} elseif ($option == 'PG') {
												$stmt1 = $db->prepare('SELECT * FROM pilihanganda WHERE code_question = :code_question ORDER BY id_PG ASC');
										} elseif ($option == 'Box') {
											$stmt1 = $db->prepare('SELECT * FROM box_question WHERE code_question = :code_question ORDER BY id_box ASC');
										} else {
											echo("Modul Not Available");
										}
											$stmt1->execute(array(':code_question' => $_GET['code']));
											while($row1 = $stmt1->fetch()){

											if ($no == 1) { ?>
												<div class="tab-pane active" id="tab<?php echo $no; ?>">
										<?php	} else { ?>
												<div class="tab-pane" id="tab<?php echo $no; ?>">
										<?php	}
										?>
											
											<?php
											if ($option == 'Essai') {
											?>
												<fieldset>
													<?php if (!$row1['media'] == NULL) { ?>
														<div class="panel-body">
															<center><object width="356px" height="262px" data="user/<?php echo $row1['media']; ?>"></object></center>
										  				</div>
													<?php } ?>
												    <div class="col-sm-12">
												    <?php
									      				echo '<p>'.$row1['question_essai'].'</p>';
									      			?>
									      			<input type="hidden" class="form-control" name="id_essai<?php echo $no; ?>" value="<?php echo $row1['id_essai']; ?>" >
												      <input type="text" class="form-control" name="jawab<?php echo $no; ?>" placeholder="Your Answer" >
												      <br>
												  </div>
												</fieldset>
											<?php
											} elseif ($option == 'PG') {
											?>
												<fieldset>
													<div class="form-group">
														<?php if (!$row1['media'] == NULL) { ?>
															<div class="panel-body">
																<center><object width="356px" height="262px" data="user/<?php echo $row1['media']; ?>"></object></center>
											  				</div>
														<?php } ?>
															<input type="hidden" class="form-control" name="id_PG<?php echo $no; ?>" value="<?php echo $row1['id_PG']; ?>" >
														    <label class="control-label"><?php echo '<p>'.$row1['question_PG'].'</p>';?> </label>
														    <br>
																	<div class="radio">
																		<label>
																			<input name="jawab<?php echo $no; ?>" type="radio" value="<?php echo $row1['pil1']; ?>">
																			<?php echo $row1['pil1']; ?> </label>
																	</div>
																	<br>
																	<div class="radio">
																		<label>
																			<input type="radio" name="jawab<?php echo $no; ?>" value="<?php echo $row1['pil2']; ?>">
																			<?php echo $row1['pil2']; ?> </label>
																	</div>
																	<br>
																	<div class="radio">
																		<label>
																			<input type="radio" name="jawab<?php echo $no; ?>" value="<?php echo $row1['pil3']; ?>">
																			<?php echo $row1['pil3']; ?> </label>
																	</div>
																	<br>
																	<div class="radio">
																		<label>
																			<input type="radio" name="jawab<?php echo $no; ?>" value="<?php echo $row1['pil4']; ?>">
																			<?php echo $row1['pil4']; ?> </label>
																	</div>
															</div>
													</fieldset>
											<?php
											} elseif ($option == 'Box') {
												$jml_box = $row1['jml_box'];
											?>
												<fieldset>
													<div class="form-group">
														<?php if (!$row1['media'] == NULL) { ?>
															<div class="panel-body">
																<center><object width="1200px" height="550px" data="user/<?php echo $row1['media']; ?>"></object></center>
											  				</div>
														<?php } ?>
														<input type="hidden" class="form-control" name="id_box<?php echo $no; ?>" value="<?php echo $row1['id_box']; ?>" >
														    <label class="control-label"><?php echo '<p>'.$row1['question_box'].'</p>';?> </label>
														    <br>
														    <div class="row">
																<div class="col-sm-12 pull-left">
																	<input type="text" class="form-control" name="jawab<?php echo $no; ?>" placeholder="Type Here . . ." >
																</div>
															</div>
															<hr>
															<div class="row">
																<div class="col-sm-6 pull-left">
															
																<label class="control-label"><?php echo $row1['pesan']; ?></label>
																<br>
																<br>
																<center>
																<font size="5" color="#f0ad4e"> | </font>
																<?php
																	$numbers = range(1, $jml_box);
																	shuffle($numbers);
																	// echo $numbers[2];
																	for ($i=0; $i < $jml_box; $i++) { 
																		 ?>
																	
																	<font size="5" color="#d9534f"><?php echo $row1['box'.$numbers[$i]];?></font>
																	<font size="5" color="#f0ad4e"> | </font>
															<?php	} ?>


																</center>
																</div>
															</div>
													</div>
												</fieldset>
											<?php
											} else {
												echo("Modul Not Available");
											}
											?>
										</div>
										<?php
											$no++;	}
										?>	
										<br>
										<div class="col-md-10">
						                  <input type="Submit" name="submit" class="btn btn-success btn-lg" >
					                  </div>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- divider -->
				<div class="row">
					<div class="col-lg-12">
						<div class="solidline">
						</div>
					</div>
				</div>
				<!-- end divider -->
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

	 <?php
      $score = 0;
      $jawaban1 = "";
      $jawaban2 = "";
      $jawaban3 = "";
      $jawaban4 = "";
      $jawaban5 = "";
      $out_of = 0;

		  //process login form if submitted
			if(isset($_POST['submit'])){

				//collect form data
				extract($_POST);
					if ($option == 'Essai') {
							for ($j=$no-1; $j > 0; $j--) {
								$stmt = $db->prepare('SELECT answer_essai FROM essai WHERE id_essai = :id_essai ');
								$stmt->execute(array(':id_essai' =>$_POST['id_essai'."$j"]));
								$row = $stmt->fetch();
									${hasil.$j} = $_POST['jawab'."$j"];
								if(strtolower($_POST['jawab'."$j"]) == trim(strtolower($row['answer_essai']))) {
									$score = $score + 1;
									${jawaban.$j} = "Correct";
								} else {
									$score = $score + 0;
									${jawaban.$j} = "Wrong";
								}

								$stmt1 = $db->prepare('SELECT * FROM answer_cadangan WHERE id_question = :id_question && code_question = :code_question');
								$stmt1->execute(array(
									':id_question' => $_POST['id_essai'."$j"],
									'code_question' => $_GET['code']
									));
								while($row1 = $stmt1->fetch()){
									if (strtolower($_POST['jawab'."$j"]) == trim(strtolower($row1['cadangan']))){
									$score = $score + 1;
									${jawaban.$j} = "Correct";
									}
								}
							}						
					} elseif ($option == 'PG') {
							for ($j=5; $j > 0; $j--) { 
								$stmt = $db->prepare('SELECT answer_PG FROM pilihanganda WHERE id_PG = :id_PG');
								$stmt->execute(array(':id_PG' => $_POST['id_PG'."$j"]));
								while($row = $stmt->fetch()){
									${hasil.$j} = $_POST['jawab'."$j"];
								if(strtolower($_POST['jawab'."$j"]) == strtolower($row['answer_PG'])) {
									$score = $score + 1;
									${jawaban.$j} = "Correct";
								} else {
									$score = $score + 0;
									${jawaban.$j} = "Wrong";
								}
							}
								$out_of = $out_of + 1;
							}
					} elseif ($option == 'Box') {
							for ($j=$no-1; $j > 0; $j--) {
								$stmt = $db->prepare('SELECT answer_box FROM box_question WHERE id_box = :id_box ');
								$stmt->execute(array(':id_box' => $_POST['id_box'."$j"]));
								$row = $stmt->fetch();
									${hasil.$j} = $_POST['jawab'."$j"];
								if(strtolower($_POST['jawab'."$j"]) == trim(strtolower($row['answer_box']))) {
									$score = $score + 1;
									${jawaban.$j} = "Correct";
								} else {
									$score = $score + 0;
									${jawaban.$j} = "Wrong";
								}

								$stmt1 = $db->prepare('SELECT * FROM answer_cadangan WHERE id_question = :id_question && code_question = :code_question');
								$stmt1->execute(array(
									':id_question' => $_POST['id_essai'."$j"],
									'code_question' => $_GET['code']
									));
								while($row1 = $stmt1->fetch()){
									if (strtolower($_POST['jawab'."$j"]) == trim(strtolower($row1['cadangan']))){
									$score = $score + 1;
									${jawaban.$j} = "Correct";
									}
								}
							}
						}

				try {

				//insert into database
				$stmt = $db->prepare('INSERT INTO process (date_process,type_question,code_question,userID,score,out_of,jawaban1,jawaban2,jawaban3,jawaban4,jawaban5,hasil1,hasil2,hasil3,hasil4,hasil5) VALUES (:date_process, :type_question, :code_question, :userID, :score, :out_of, :jawaban1, :jawaban2, :jawaban3, :jawaban4, :jawaban5, :hasil1, :hasil2, :hasil3, :hasil4, :hasil5)') ;
				$stmt->execute(array(
					':date_process' => date('Y-m-d H:i:s'),
					':type_question' => $type,
					':code_question' => $code_question,
					':userID' => $userID,
					':score' => $score,
					':out_of' => $out_of,
					':jawaban1' => $jawaban1,
					':jawaban2' => $jawaban2,
					':jawaban3' => $jawaban3,
					':jawaban4' => $jawaban4,
					':jawaban5' => $jawaban5,
					':hasil1' => $hasil1,
					':hasil2' => $hasil2,
					':hasil3' => $hasil3,
					':hasil4' => $hasil4,
					':hasil5' => $hasil5
				));

				//redirect to index page
				header('Location: result.php?action=succes');
				exit;

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
				
			}//end if submit
      ?>

	
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