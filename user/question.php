<?php
//include config
require_once('../includes/config.php'); 
if(!$user->is_logged_in()){ header('Location: ../login.php'); }
  else { $userID = $_SESSION['loggedin']; }

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

if(isset($_GET['del_box'])){ 

	$stmt = $db->prepare('DELETE FROM box_question WHERE id_box = :id_box') ;
	$stmt->execute(array(':id_box' => $_GET['del_box']));

	header('Location: question.php?action=deleted');
	exit;
}

if(isset($_GET['del_question'])){ 

	$stmt = $db->prepare('DELETE FROM tbl_question WHERE id_question = :id_question') ;
	$stmt->execute(array(':id_question' => $_GET['del_question']));

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
	  function del_essai(id_question, code_question)
	  {
		  if (confirm("Are you sure you want to delete '" + code_question + "'"))
		  {
		  	window.location.href = 'question.php?del_question='+id_question;
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

	  <script language="JavaScript" type="text/javascript">
	  function del_box(id_box, question_box)
	  {
		  if (confirm("Are you sure you want to delete '" + question_box + "'"))
		  {
		  	window.location.href = 'question.php?del_box='+id_box;
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
		  <div class="col-md-9">
		  	<div class="row">
		  		<div class="col-md-11">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">List Unit Question</div>
						</div>
		  				<div class="panel-body">
		  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								<thead>
									<tr>
										<th>No.</th>
										<th>Type</th>
										<th>Unit</th>
										<th>Type Answer</th>
										<th>Content</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM tbl_question ORDER BY id_question ASC');
										while($row = $stmt->fetch()){
											$media = $row['media_question'];
											if ($media == NULL) {
												$content = '<i class="glyphicon glyphicon-remove"></i>';
											} else {
												$content = '<a href="#"><i class="glyphicon glyphicon-ok"></i></a>';
											}
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo '<p>'.$row['type_question'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['code_question'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['option_question'].'</p>'; ?></td>
										<td><?php echo $content; ?></td>
										<td>
											<a href="edit_question.php?id=<?php echo $row['id_question'];?>&&type=question">Edit</a> | 
											<a href="javascript:del_essai('<?php echo $row['id_question'];?>','<?php echo $row['code_question'];?>')">Delete</a>
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
							<div class="panel-title">List Sort Answer Question</div>
						</div>
		  				<div class="panel-body">
		  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								<thead>
									<tr>
										<th>No.</th>
										<th>Type</th>
										<th>Chapter</th>
										<th>Question</th>
										<th>Answer</th>
										<th>Content</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM essai ORDER BY id_essai ASC');
										while($row = $stmt->fetch()){
											$media = $row['media'];
											if ($media == NULL) {
												$content = '<i class="glyphicon glyphicon-remove"></i>';
											} else {
												$content = '<a href="#"><i class="glyphicon glyphicon-ok"></i></a>';
											}
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo '<p>'.$row['type'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['code_question'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['question_essai'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['answer_essai'].'</p>'; ?></td>
										<td><?php echo $content; ?></td>
										<td>
											<a href="edit_question.php?id=<?php echo $row['id_essai'];?>&&type=essai">Edit</a> | 
											<a href="javascript:del_essai('<?php echo $row['id_essai'];?>','<?php echo $row['question_essai'];?>')">Delete</a>
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
							<div class="panel-title">List Question Multiple Choice</div>
						</div>
		  				<div class="panel-body">
		  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
								<thead>
									<tr>
										<th>No.</th>
										<th>Type</th>
										<th>Chapter</th>
										<th>Question</th>
										<th>Answer</th>
										<th width="20%">Choice</th>
										<th>Content</th>
										<th width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM pilihanganda order by id_PG');
										while($row = $stmt->fetch()){
											if ($row['media'] == NULL) {
												$content1 = '<i class="glyphicon glyphicon-remove"></i>';
											} else {
												$content1 = '<a href="#"><i class="glyphicon glyphicon-ok"></i></a>';
											}
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo '<p>'.$row['type'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['code_question'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['question_PG'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['answer_PG'].'</p>'; ?></td>
										<td>
											<?php echo '<p>A. '.$row['pil1'].'</p>'; ?>
											<?php echo '<p>B. '.$row['pil2'].'</p>'; ?>
											<?php echo '<p>C. '.$row['pil3'].'</p>'; ?>
											<?php echo '<p>D. '.$row['pil4'].'</p>'; ?>
										</td>
										<td><?php echo $content1; ?></td>
										<td>
											<a href="edit_question.php?id=<?php echo $row['id_PG'];?>&&type=PG">Edit</a> | 
											<a href="javascript:del_pg('<?php echo $row['id_PG'];?>','<?php echo $row['question_PG'];?>')">Delete</a>
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
							<div class="panel-title">List Question Multiple Choice</div>
						</div>
		  				<div class="panel-body">
		  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
								<thead>
									<tr>
										<th>No.</th>
										<th>Type</th>
										<th>Chapter</th>
										<th>Question</th>
										<th>Answer</th>
										<th width="20%">Choice</th>
										<th>Content</th>
										<th width="10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="gradeA">
									<?php
										try {
										$no = 1;
										$stmt = $db->query('SELECT * FROM box_question order by id_box');
										while($row = $stmt->fetch()){
											if ($row['media'] == NULL) {
												$content1 = '<i class="glyphicon glyphicon-remove"></i>';
											} else {
												$content1 = '<a href="#"><i class="glyphicon glyphicon-ok"></i></a>';
											}
										?>
										<td><?php echo $no; ?></td>
										<td><?php echo '<p>'.$row['type'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['code_question'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['question_box'].'</p>'; ?></td>
										<td><?php echo '<p>'.$row['answer_box'].'</p>'; ?></td>
										<td>
											<?php echo '<p>1. '.$row['box1'].'</p>'; ?>
											<?php echo '<p>2. '.$row['box2'].'</p>'; ?>
											<?php echo '<p>3. '.$row['box3'].'</p>'; ?>
											<?php echo '<p>4. '.$row['box4'].'</p>'; ?>
											<?php echo '<p>5. '.$row['box5'].'</p>'; ?>
											<?php echo '<p>6. '.$row['box5'].'</p>'; ?>
										</td>
										<td><?php echo $content1; ?></td>
										<td>
											<a href="edit_question.php?id=<?php echo $row['id_box'];?>&&type=BOX">Edit</a> | 
											<a href="javascript:del_box('<?php echo $row['id_box'];?>','<?php echo $row['question_box'];?>')">Delete</a>
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
               Copyright 2017 <a href='#'>Website</a>
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