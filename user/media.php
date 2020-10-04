<?php
//include config
require_once('../includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); }

//show message from add / edit page
if(isset($_GET['del_essai'])){ 

	$stmt = $db->prepare('DELETE FROM essai WHERE id_essai = :id_essai') ;
	$stmt->execute(array(':id_essai' => $_GET['del_essai']));

	header('Location: question.php?action=deleted');
	exit;
}

if(isset($_GET['del_pg'])){ 

	$stmt = $db->prepare('DELETE FROM pilihanganda WHERE id_PG = :id_PG') ;
	$stmt->execute(array(':id_PG' => $_GET['del_pg']));

	header('Location: question.php?action=deleted');
	exit;
}

if(isset($_GET['del_media'])){ 

	$stmt = $db->prepare('DELETE FROM media WHERE id_media = :id_media') ;
	$stmt->execute(array(':id_media' => $_GET['del_media']));

	header('Location: question.php?action=deleted');
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
	  function del_essai(id_essai, question_essai)
	  {
		  if (confirm("Are you sure you want to delete '" + question_essai + "'"))
		  {
		  	window.location.href = 'question.php?del_essai='+id_essai;
		  }
	  }
	  </script>

	  <script language="JavaScript" type="text/javascript">
	  function del_pg(id_PG, question_PG)
	  {
		  if (confirm("Are you sure you want to delete '" + question_PG + "'"))
		  {
		  	window.location.href = 'question.php?del_pg='+id_PG;
		  }
	  }
	  </script>

	  <script language="JavaScript" type="text/javascript">
	  function del_media(id_media, nama_media)
	  {
		  if (confirm("Are you sure you want to delete '" + nama_media + "'"))
		  {
		  	window.location.href = 'question.php?del_media='+id_media;
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
    	<?php
        if( $user->cek_level($userID) =='admin'){
          include "tab_admininstrator.php";
        } else if ($user->cek_level($userID) =='instruktur') {
          include "tab_admin.php";
        } else {
          include "tab_student.php";
        }
      ?>
		  <div class="col-md-9">
		  	<div class="row">
		  		<div class="col-md-11">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">List File Media</div>
						</div>
		  				<div class="panel-body">
		  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
								<thead>
									<tr>
										<th>No.</th>
										<th>Media Name</th>
										<th>Date Upload</th>
										<th>User Upload</th>
										<th>View Media</th>
										<th width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM media order by id_media ASC');
										while($row = $stmt->fetch()){
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo '<p>'.$row['nama_media'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['dateUpload'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['username'].'</p>'; ?></td>
										<td><a href="<?php echo $row['lokasi_media'].$row['file_name']; ?>"><i class="glyphicon glyphicon-eye-open"></i> View</a></td>
										<td> 
											<a href="javascript:del_media('<?php echo $row['id_media'];?>','<?php echo $row['nama_media'];?>')">Delete</a>
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