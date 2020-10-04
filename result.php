<?php
//include config
require_once('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
else { $userID = $_SESSION['loggedin']; }

if(isset($_GET['note'])){ ?>

	<script language="JavaScript" type="text/javascript">
			  alert("Are Your Finishid this Unit.");
	</script>
<?php
}

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
                        <li class="active"><a href="result.php">Result</a></li>
                        <li><a href="about.php">About Us</a></li>
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
					<li class="active">Result</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<?php
		 try {
          $stmt = $db->prepare('SELECT * FROM users WHERE userID = :userID') ;
          $stmt->execute(array(':userID' => $userID));
          $row = $stmt->fetch(); 

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
	?>
	<section id="content">
		<div class="container">
			<div class="row">
				<div class="panel-body">
					<div class="col-lg-4">
					<strong>
						<table class="table">
					        <tr class="warning">
					          <td>Full Name</td>
					          <td>:</td>
					          <td><?php echo $row['nama_lengkap']; ?></td>
					        </tr>
					        <tr>
					          <td>Class</td>
					          <td>:</td>
					          <td><?php echo $row['class_murid']; ?></td>
					        </tr>
					        <tr class="warning">
					          <td>Registration Number</td>
					          <td>:</td>
					          <td><?php echo $row['nomor_induk']; ?></td>
					        </tr>
					    </table>
					  </strong>
					</div>
			</div>
			</div>
			<div class="row">
			<center><h3><span class="highlight">GRAMMAR RESULT</span></h3></center>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "GrammarAdjective" && process.type_question = "Grammar" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Adjective</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table>    
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN box_question on process.code_question = box_question.code_question WHERE process.userID = :userID && process.code_question = "GrammarAdjective" && process.type_question = "Grammar" ORDER BY process.date_process, box_question.id_box ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_box'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "GrammarAdverb" && process.type_question = "Grammar" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Adverb</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table>  
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN box_question on process.code_question = box_question.code_question WHERE process.userID = :userID && process.code_question = "GrammarAdverb" && process.type_question = "Grammar" ORDER BY process.date_process, box_question.id_box ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_box'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "GrammarPreposition" && process.type_question = "Grammar" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Preposition</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table> 
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN box_question on process.code_question = box_question.code_question WHERE process.userID = :userID && process.code_question = "GrammarPreposition" && process.type_question = "Grammar" ORDER BY process.date_process, box_question.id_box ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_box'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "GrammarSimple" && process.type_question = "Grammar" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Simple Present Tense</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table> 
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN box_question on process.code_question = box_question.code_question WHERE process.userID = :userID && process.code_question = "GrammarSimple" && process.type_question = "Grammar" ORDER BY process.date_process, box_question.id_box ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_box'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
			<center><h3><span class="highlight">READING RESULT</span></h3></center>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ReadingPeople" && process.type_question = "Reading" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">People</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table> 
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							
								$no = 1;
							
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN essai on process.code_question = essai.code_question WHERE process.userID = :userID && process.code_question = "ReadingPeople" && process.type_question = "Reading" ORDER BY process.date_process, essai.id_essai ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_essai'].'</p>'; ?></td>
							</tr>
							<?php $no++;  }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ReadingAnimal" && process.type_question = "Reading" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Animal</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table> 
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN essai on process.code_question = essai.code_question WHERE process.userID = :userID && process.code_question = "ReadingAnimal" && process.type_question = "Reading" ORDER BY process.date_process, essai.id_essai ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_essai'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ReadingPlace" && process.type_question = "Reading" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Place</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table> 
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN essai on process.code_question = essai.code_question WHERE process.userID = :userID && process.code_question = "ReadingPlace" && process.type_question = "Reading" ORDER BY process.date_process, essai.id_essai ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_essai'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ReadingThing" && process.type_question = "Reading" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Things</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table>  
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					            <th>Other Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN essai on process.code_question = essai.code_question WHERE process.userID = :userID && process.code_question = "ReadingThing" && process.type_question = "Reading" ORDER BY process.date_process, essai.id_essai ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_essai'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
			<center><h3><span class="highlight">LISTENING RESULT</span></h3></center>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ListeningPeople" && process.type_question = "Listening" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">People</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table> 
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN pilihanganda on process.code_question = pilihanganda.code_question WHERE process.userID = :userID && process.code_question = "ListeningPeople" && process.type_question = "Listening" ORDER BY process.date_process, pilihanganda.id_PG ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_PG'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ListeningAnimal" && process.type_question = "Listening" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Animal</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table> 
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN pilihanganda on process.code_question = pilihanganda.code_question WHERE process.userID = :userID && process.code_question = "ListeningAnimal" && process.type_question = "Listening" ORDER BY process.date_process, pilihanganda.id_PG ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_PG'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ListeningPlace" && process.type_question = "Listening" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Place</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table>    
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN pilihanganda on process.code_question = pilihanganda.code_question WHERE process.userID = :userID && process.code_question = "ListeningPlace" && process.type_question = "Listening" ORDER BY process.date_process, pilihanganda.id_PG ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_PG'].'</p>'; ?></td>
							</tr>
							
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ListeningThing" && process.type_question = "Listening" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Things</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table>    
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN pilihanganda on process.code_question = pilihanganda.code_question WHERE process.userID = :userID && process.code_question = "ListeningThing" && process.type_question = "Listening" ORDER BY process.date_process, pilihanganda.id_PG ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_PG'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel-body">
					<table class="table table-hover">
					<?php
					$stmt4 = $db->prepare('SELECT * FROM process WHERE process.userID = :userID && process.code_question = "ListeningOccupation" && process.type_question = "Listening" ');
					$stmt4->execute(array(':userID' => $userID));
					$row4 = $stmt4->fetch();
							?>
						<thead>
					    	<tr>
					        <th width="80%">Occupation</th>
					        <th>Score: <?php echo $row4['score']; ?></th>
					        </tr>
				        </thead>
				    </table>  
						<table class="table table-hover">
					        <thead>
					          <tr class="success">
					            <th>No.</th>
					            <th>Your Answer</th>
					            <th>Corect Answer</th>
					         </tr>
					        </thead>
					        <tbody>
					         <tr>
					         <?php
							try {
							$no = 1;
							$stmt = $db->prepare('SELECT * FROM process LEFT JOIN pilihanganda on process.code_question = pilihanganda.code_question WHERE process.userID = :userID && process.code_question = "ListeningOccupation" && process.type_question = "Listening" ORDER BY process.date_process, pilihanganda.id_PG ASC');
							$stmt->execute(array(':userID' => $userID));
								while($row = $stmt->fetch()){
							?>
								<td><?php echo $no; ?></td>
								<td><?php echo '<p>'.$row['jawaban'."$no"].'</p>'; ?></td>
								<td><?php echo '<p>'.$row['answer_PG'].'</p>'; ?></td>
							</tr>
							<?php $no++; }
							} catch(PDOException $e) {
							    echo $e->getMessage();
							}
							?>
					        </tbody>
					    </table>
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