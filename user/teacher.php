<?php
//include config
require_once('../includes/config.php'); 

if(!$user->is_logged_in()){ header('Location: ../login.php'); }
  else { $userID = $_SESSION['loggedin']; }

//show message from add / edit page
if(isset($_GET['delpost'])){ 

	$stmt = $db->prepare('DELETE FROM users WHERE userID = :userID') ;
	$stmt->execute(array(':userID' => $_GET['delpost']));

	header('Location: user.php?action=deleted');
	exit;
}
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

      <script language="JavaScript" type="text/javascript">
  function delpost(id, username)
  {
	  if (confirm("Are you sure you want to delete '" + username + "'"))
	  {
	  	window.location.href = 'user.php?delpost=' + id;
	  }
  }
  </script>

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
  				<div class="col-md-8">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">List User</div>
						</div>
		  				<div class="panel-body">
		  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								<thead>
									<tr>
										<th align="center">No.</th>
										<th>Reg. Number</th>
										<th>Full Name</th>
										<th>Class</th>
										<th class="center">Username</th>
										<th align="text-centere">Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM users WHERE type_user = "instruktur" ORDER BY userID');
										while($row = $stmt->fetch()){
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo '<p>'.$row['nomor_induk'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['nomor_induk'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['class_murid'].'</p>'; ?></td>
										<td class="center"><?php echo '<p>'.$row['username'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['email'].'</p>'; ?></td>
										<td>
											<a href="edit_user.php?id=<?php echo $row['userID'];?>">Edit</a> | 
											<a href="javascript:delpost('<?php echo $row['userID'];?>','<?php echo $row['username'];?>')">Delete</a>
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

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2017 <a href='../about.html'>English Gate</a>
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