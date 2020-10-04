<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
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

    //collect form data
    extract($_POST);

    //very basic validation
    if($username ==''){
      $error[] = 'Please enter your Username';
    }

    if($nomor_induk ==''){
      $error[] = 'Please enter your ID';
    }

    if($nama_lengkap ==''){
      $error[] = 'Please enter your Full Name';
    }

    if($class_murid ==''){
      $error[] = 'Please enter your Class';
    }

    if($password ==''){
      $error[] = 'Please enter Password';
    }

    if($email ==''){
      $error[] = 'Please enter Your Email';
    }

    if(!isset($error)){

      $hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

      try {

        //insert into database
        $stmt = $db->prepare('INSERT INTO users (nama_lengkap,class_murid,nomor_induk,username,password,email,type_user) VALUES (:nama_lengkap, :class_murid, :nomor_induk, :username, :password, :email, :type_user)') ;
        $stmt->execute(array(
          ':nama_lengkap' => $nama_lengkap,
          ':class_murid' => $class_murid,
          ':nomor_induk' => $nomor_induk,
          ':username' => $username,
          ':password' => $hashedpassword,
          ':email' => $email,
          ':type_user' => $type_user
        ));

        //redirect to index page
        header('Location: user.php?action=added');
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
                      <legend>Input Users</legend>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post">
                  <fieldset>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor_induk" class="form-control" placeholder="ID">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_lengkap" class="form-control" placeholder="Full Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-10">
                      <input type="text" name="class_murid" class="form-control" placeholder="Class or Occupation">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="select-1">Type User</label>
                      <div class="col-md-10">
                        <select class="form-control" id="select-1" name="type_user">
                          <option value="Student" selected="selected">Student</option>
                          <option value="instruktur">Instruktur</option>
                        </select> 
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