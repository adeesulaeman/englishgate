<?php
//include config
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
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

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
  ?>
    <div class="page-content">
    	<div class="row">
    	<div class="col-md-3">
		  <?php include "tab_student.php" ?>
		</div>
		  <div class="col-md-9">
		  	<div class="row">
  				<div class="col-md-11">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Reading Question</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-hover">
				              <thead>
				                <tr>
				                  <th>No.</th>
								  <th>Chapter</th>
								  <th>Question Type</th>
								  <th></th>
				                </tr>
				              </thead>
				              <tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM tbl_question WHERE type = "Reading" ORDER BY id_question ASC');
										while($row = $stmt->fetch()){
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo $row['code_question']; ?></td>
										<td><?php echo '<p>'.$row['option'].'</p>'; ?></td>
										<td>
											<a href="answer.php?code=<?php echo $row['code_question'];?>"><i class="glyphicon glyphicon-share"></i> Assign</a>
										</td>
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
		  		<div class="col-md-11">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Listening Question</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-hover">
				              <thead>
				                <tr>
				                  <th>No.</th>
								  <th>Chapter</th>
								  <th>Question Type</th>
								  <th></th>
				                </tr>
				              </thead>
				              <tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM tbl_question WHERE type = "Listening" ORDER BY id_question ASC');
										while($row = $stmt->fetch()){
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo $row['code_question']; ?></td>
										<td><?php echo '<p>'.$row['option'].'</p>'; ?></td>
										<td>
											<a href="answer.php?code=<?php echo $row['code_question'];?>"><i class="glyphicon glyphicon-share"></i> Assign</a>
										</td>
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
		  		<div class="col-md-11">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Grammar Question</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-hover">
				              <thead>
				                <tr>
				                  <th>No.</th>
								  <th>Chapter</th>
								  <th>Question Type</th>
								  <th></th>
				                </tr>
				              </thead>
				              <tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM tbl_question WHERE type = "Grammar" ORDER BY id_question ASC');
										while($row = $stmt->fetch()){
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo $row['code_question']; ?></td>
										<td><?php echo '<p>'.$row['option'].'</p>'; ?></td>
										<td>
											<a href="answer.php?code=<?php echo $row['code_question'];?>"><i class="glyphicon glyphicon-share"></i> Assign</a>
										</td>
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
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
  </body>
</html>