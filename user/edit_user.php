<?php
  include '../includes/config.php'; 
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

  //if form has been submitted process it
  if(isset($_POST['submit'])){

    $_POST = array_map( 'stripslashes', $_POST );

    //collect form data
    extract($_POST);

    //very basic validation
    if($username ==''){
      $error[] = 'Please enter the username.';
    }

    if( strlen($password) > 0){

      if($password ==''){
        $error[] = 'Please enter the password.';
      }

      if($passwordConfirm ==''){
        $error[] = 'Please confirm the password.';
      }

      if($password != $passwordConfirm){
        $error[] = 'Passwords do not match.';
      }

    }
    

    if($email ==''){
      $error[] = 'Please enter the email address.';
    }

    if(!isset($error)){

      try {
        if(!($password=="")){

        $hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);
        //insert into database
        $stmt = $db->prepare('UPDATE users set nama_lengkap = :nama_lengkap, class_murid = :class_murid, nomor_induk = :nomor_induk, username = :username, password = :password, email = :email WHERE userID = :userID') ;
        $stmt->execute(array(
          ':nama_lengkap' => $nama_lengkap,
          ':class_murid' => $class_murid,
          ':nomor_induk' => $nomor_induk,
          ':username' => $username,
          ':password' => $hashedpassword,
          ':email' =>$email,
          ':userID' => $userID
        ));

        } else {
          //insert into database
        $stmt = $db->prepare('UPDATE users set nama_lengkap = :nama_lengkap, class_murid = :class_murid, nomor_induk = :nomor_induk, username = :username, email = :email WHERE userID = :userID') ;
        $stmt->execute(array(
          ':nama_lengkap' => $nama_lengkap,
          ':class_murid' => $class_murid,
          ':nomor_induk' => $nomor_induk,
          ':username' => $username,
          ':email' =>$email,
          ':userID' => $userID
        ));
        }

        //redirect to index page
        header('Location: user.php?action=updated');
        exit;

      } catch(PDOException $e) {
          echo $e->getMessage();
      }

    }

  }

  //check for any errors
  if(isset($error)){
    foreach($error as $error){
      echo '<p class="error">'.$error.'</p>';
    }
  }
  
    try {
      $stmt = $db->prepare('SELECT * FROM users WHERE userID = :userID') ;
      $stmt->execute(array(':userID' => $_GET['id']));
      $row = $stmt->fetch(); 

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  
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
                      <legend>Edit Question</legend>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                  <input type='hidden' name='userID' value='<?php echo $row['userID'];?>'>
                  <fieldset>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Registration Number</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor_induk" class="form-control" id="inputEmail3" value="<?php echo $row['nomor_induk'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_lengkap" class="form-control" id="inputEmail3" value="<?php echo $row['nama_lengkap'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-10">
                      <input type="text" name="class_murid" class="form-control" id="inputEmail3" value="<?php echo $row['class_murid'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" id="inputEmail3" value="<?php echo $row['username'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputEmail3" value="<?php echo $row['email'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password (Only Change)</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputEmail3" value="" placeholder="Only Change">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="passwordConfirm" class="form-control" id="inputEmail3" value="" placeholder="Confirm Password Change">
                    </div>
                  </div>
                    </fieldset>
                  <div class="col-md-10">
                  <input type="Submit" name="submit" class="btn btn-primary">
                  </div>
                </form>
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

     <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
  </body>
</html>