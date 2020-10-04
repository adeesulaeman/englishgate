<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); }
else { $userID = $_SESSION['loggedin']; }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ENGLISH GATE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <?php 
  include "menu.php";
  $option = "";
  try {
  	  $stmt = $db->prepare('SELECT * FROM tbl_question WHERE code_question = :code_question') ;
      $stmt->execute(array(':code_question' => $_GET['code']));
      $row = $stmt->fetch();

      } catch(PDOException $e) {
        echo $e->getMessage();
    }
      $option = $row['option'];
      $type = $row['type'];
      $code_question = $row['code_question'];
      $code = $_GET['code'];
      $media = $row['media'];
      $no = 1;
      
  ?>


    <div class="page-content">
    	<div class="row">
    	<div class="col-md-3">
		  <?php
        if( $user->cek_level($userID) =='admin'){
          include "tab_admininstrator.php";
        } else if ($user->cek_level($userID) =='instruktur') {
          include "tab_admin.php";
        } else {
          include "tab_student.php";
        }
      ?>

		</div>
		  <div class="col-md-9">
		  	<div class="row">
		  		<div class="col-md-10">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">The Question</div>
						</div>
						<?php if (!$media == NULL) { ?>
							<div class="panel-body">
		  					<center><object width="512px" height="384px" data="<?php echo $media; ?>"></object></center>
		  				</div>
						<?php }
						?>
		  			</div>
		  		</div>
		  	</div>
					<div class="col-md-10">
						<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title"><legend> Question </legend></div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
						<form class="form-inline" role="form" method="post">
		  				<div class="panel-body">
		  					<div id="rootwizard">
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
										?>
											<div class="tab-pane" id="tab<?php echo $no; ?>">
											<?php
											if ($option == 'Essai') {
											?>
												<fieldset>
													<?php if (!$row1['media'] == NULL) { ?>
														<div class="panel-body">
															<center><object width="356px" height="262px" data="<?php echo $row1['media']; ?>"></object></center>
										  				</div>
													<?php } ?>
												    <div class="col-sm-8">
												    <?php

									      				echo '<p>'.$row1['question_essai'].'</p>';
									      			?> 
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
																<center><object width="356px" height="262px" data="<?php echo $row1['media']; ?>"></object></center>
											  				</div>
														<?php } ?>
														    <label class="control-label"><?php echo '<p>'.$row1['question_PG'].'</p>';?> </label>
														    <br>
																	<div class="radio">
																		<label>
																			<input name="jawab<?php echo $no; ?>" type="radio" value="<?php echo $row1['pil1']; ?>">
																			<?php echo '<p>'.$row1['pil1'].'</p>'; ?> </label>
																	</div>
																	<br>
																	<div class="radio">
																		<label>
																			<input type="radio" name="jawab<?php echo $no; ?>" value="<?php echo '<p>'.$row1['pil2'].'</p>'; ?>">
																			<?php echo '<p>'.$row1['pil2'].'</p>'; ?> </label>
																	</div>
																	<br>
																	<div class="radio">
																		<label>
																			<input type="radio" name="jawab<?php echo $no; ?>" value="<?php echo '<p>'.$row1['pil3'].'</p>'; ?>">
																			<?php echo '<p>'.$row1['pil3'].'</p>'; ?> </label>
																	</div>
																	<br>
																	<div class="radio">
																		<label>
																			<input type="radio" name="jawab<?php echo $no; ?>" value="<?php echo '<p>'.$row1['pil4'].'</p>'; ?>">
																			<?php echo '<p>'.$row1['pil4'].'</p>'; ?> </label>
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
																<center><object width="356px" height="262px" data="<?php echo $row1['media']; ?>"></object></center>
											  				</div>
														<?php } ?>
														    <label class="control-label"><?php echo '<p>'.$row1['question_box'].'</p>';?> </label>
														    <input type='hidden' name='id_box' value='<?php echo $row1['id_box'];?>'>
														    <br>
														    <div class="row">
																<div class="col-sm-12 pull-left">
																	<input type="text" class="form-control" name="jawab<?php echo $no; ?>" placeholder="Choose a word in the box!" >
																</div>
															</div>
															<hr>
															<div class="row">
																<div class="col-sm-12 pull-left">
																<center>
																<font size="5" color="#f0ad4e"> | </font>
																<?php
																	$numbers = range(1, $jml_box);
																	shuffle($numbers);
																	// echo $numbers[2];
																	for ($i=0; $i < $jml_box; $i++) { 
																		 ?>
																	
																	<font size="4" color="#d9534f"><?php echo $row1['box'.$numbers[$i]];?></font>
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
									<div class="navbar">
									 	<div class="navbar-inner">
										    <div class="container">
												<ul class="nav nav-pills">
												<hr>
												<?php
													for ($i = 1; $i < $no; $i++) { ?>
														<li><a href="#tab<?php echo $i; ?>" data-toggle="tab">Number <?php echo $i; ?></a></li>
												<?php	}
												 ?>																	
												</ul>
										 	</div>
										</div>
										<br>
										<div class="col-md-10">
						                  <input type="Submit" name="submit" class="btn btn-success btn-lg" >
					                  </div>
								  </div>
									<ul class="pager wizard">
										<li class="previous first disabled" style="display:none;"><a href="javascript:void(0);">First</a></li>
										<li class="previous disabled"><a href="javascript:void(0);">Previous</a></li>
										<li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
									  	<li class="next"><a href="javascript:void(0);">Next</a></li>
									</ul>
								</div>	
							</div>
		  				</div>
		  				</form>
		  			</div>
					</div>	
				</div>
		  	</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2017 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

      <?php
      $score = 0;
		  //process login form if submitted
			if(isset($_POST['submit'])){

				//collect form data
				extract($_POST);

				$out_of = 0;
					if ($option == 'Essai') {
						$stmt = $db->prepare('SELECT answer_essai FROM essai WHERE code_question = :code_question ');
						$stmt->execute(array(':code_question' => $_GET['code']));
						while($row = $stmt->fetch()){
							for ($j=$no-1; $j > 0; $j--) { 
								if(strtolower($_POST['jawab'."$j"]) == trim(strtolower($row['answer_essai']))) {
									$score = $score + 1;
								} else {
									$score = $score + 0;
								}
							}
							$out_of = $out_of + 1;
						}
						$stmt = $db->prepare('SELECT * FROM answer_cadangan WHERE code_question = :code_question ');
						$stmt->execute(array(':code_question' => $_GET['code']));
						while($row = $stmt->fetch()){
							for ($j=$no-1; $j > 0; $j--) { 
								if (strtolower($_POST['jawab'."$j"]) == trim(strtolower($row['cadangan']))){
									$score = $score + 1;
								} else {
									$score = $score + 0;
								}
							}
						}
					} elseif ($option == 'PG') {
						$stmt = $db->prepare('SELECT answer_PG FROM pilihanganda WHERE code_question = :code_question');
						$stmt->execute(array(':code_question' => $_GET['code']));
						while($row = $stmt->fetch()){
							for ($j=$no-1; $j > 0; $j--) { 
								if(strtolower($_POST['jawab'."$j"]) == strtolower($row['answer_PG'])) {
									$score = $score + 1;
								} else {
									$score = $score + 0;
								}
							}
							$out_of = $out_of + 1;
						}
						$stmt = $db->prepare('SELECT * FROM answer_cadangan WHERE code_question = :code_question ');
						$stmt->execute(array(':code_question' => $_GET['code']));
						while($row = $stmt->fetch()){
							for ($j=$no-1; $j > 0; $j--) { 
								if (strtolower($_POST['jawab'."$j"]) == trim(strtolower($row['cadangan']))){
									$score = $score + 1;
								} else {
									$score = $score + 0;
								}
							}
						}
					} elseif ($option == 'Box') {
						$stmt = $db->prepare('SELECT answer_box FROM box_question WHERE code_question = :code_question ');
						$stmt->execute(array(':code_question' => $_GET['code']));
						while($row = $stmt->fetch()){
							for ($j=$no-1; $j > 0; $j--) { 
								if(strtolower($_POST['jawab'."$j"]) == trim(strtolower($row['answer_box']))) {
									$score = $score + 1;
								} else {
									$score = $score + 0;
								}
							}
							$out_of = $out_of + 1;
						}
						$stmt = $db->prepare('SELECT * FROM answer_cadangan WHERE code_question = :code_question ');
						$stmt->execute(array(':code_question' => $_GET['code']));
						while($row = $stmt->fetch()){
							for ($j=$no-1; $j > 0; $j--) { 
								if (strtolower($_POST['jawab'."$j"]) == trim(strtolower($row['cadangan']))){
									$score = $score + 1;
								} else {
									$score = $score + 0;
								}
							}
						}
					}

				try {

				//insert into database
				$stmt = $db->prepare('INSERT INTO process (date_process,type_course,code_question,userID,score,out_of) VALUES (:date_process, :type_course, :code_question, :userID, :score, :out_of)') ;
				$stmt->execute(array(
					':date_process' => date('Y-m-d H:i:s'),
					':type_course' => $type,
					':code_question' => $code_question,
					':userID' => $userID,
					':score' => $score,
					':out_of' => $out_of
				));

				//redirect to index page
				header('Location: result.php?action=succes');
				exit;

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
				
			}//end if submit
      ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
    
  </body>
</html>