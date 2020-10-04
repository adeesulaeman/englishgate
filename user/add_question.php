<!DOCTYPE html>
<html>
  <head>
    <title>ENGLISH GATE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php
  include '../includes/config.php'; 
  include 'action_upload.php';
  $n = $_GET['n'];
  $error = false;

  if(!$user->is_logged_in()){ header('Location: ../login.php'); }
  else { $userID = $_SESSION['loggedin']; }

   //if form has been submitted process it
  if(isset($_POST['submitEssai'])){
    //collect form data
    extract($_POST);

    //Mulai memorises data
    $file_name  = $_FILES['data_upload']['name'];
    $file_size  = $_FILES['data_upload']['size'];
    $folder   = './media/';

  if (!$_FILES['data_upload']['name'] == '') {
    
    //cari extensi file dengan menggunakan fungsi explode
    $explode  = explode('.',$file_name);
    $extensi  = $explode[count($explode)-1];

    
    //mulai memproses upload file
    if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
      //catat nama file ke database
        try {

            //insert into database
            $stmt = $db->prepare('INSERT INTO media (file_name,nama_media,lokasi_media,dateUpload,username) VALUES (:file_name, :nama_media, :lokasi_media, :dateUpload, :username)') ;
            $stmt->execute(array(
              ':file_name' => $file_name,
              ':nama_media' => $file_name,
              ':lokasi_media' => $folder,
              ':dateUpload' => date('Y-m-d H:i:s'),
              ':username' => $username
            ));
          } catch(PDOException $e) {
              echo $e->getMessage();
          }


      // $pesan = '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
    } else{
      // $pesan = "Proses upload eror";
    }

    $mediaUpload = $folder.$file_name;
  } else {
    $mediaUpload = NULL;
  }


    // if(!isset($error)){

      $a = 1;
          $stmt = $db->query('SELECT * FROM tbl_question');
          while($row = $stmt->fetch()){
            if($code_question == $row['code_question']) {
              $type = $row['type_question'];
              $id_question = $row['id_question'];
              $a = 0;
            } else {
              $a = 1;
            }
          }
          if ($a == 1) {
            $option = "Essai";
            $stmt = $db->prepare('INSERT INTO tbl_question (type_question,code_question,option_question,media_question) VALUES (:type_question, :code_question, :option_question, :media_question)');
              $stmt->execute(array(
                ':type_question' => $type,
                ':code_question' => $_POST['code_question'],
                ':option_question' => $option,
                ':media_question' => $mediaUpload
                ));
          }
          
          //insert into database
        $stmt = $db->prepare('INSERT INTO essai (question_essai,answer_essai,type,code_question) VALUES (:question_essai, :answer_essai, :type, :code_question)') ;
        for ($i=1; $i <= $n; $i++) { 
          $stmt->execute(array(
          ':question_essai' => $_POST['question_essai'."$i"],
          ':answer_essai' => trim($_POST['answer_essai'."$i"]),
          ':type' => $type,
          ':code_question' => $_POST['code_question']
        ));
        }
        //redirect to index page
        header('Location: question.php?action=added');
        exit;


    // }

  }



  //if form has been submitted process it
  if(isset($_POST['submitPG'])){

    //collect form data
    extract($_POST);

    //Mulai memorises data
    $file_name  = $_FILES['data_upload']['name'];
    $file_size  = $_FILES['data_upload']['size'];
    $folder   = './media/';

  if (!$_FILES['data_upload']['name'] == '') {
    
    //cari extensi file dengan menggunakan fungsi explode
    $explode  = explode('.',$file_name);
    $extensi  = $explode[count($explode)-1];

    
    //mulai memproses upload file
    if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
      //catat nama file ke database
        try {

            //insert into database
            $stmt = $db->prepare('INSERT INTO media (file_name,nama_media,lokasi_media,dateUpload,username) VALUES (:file_name, :nama_media, :lokasi_media, :dateUpload, :username)') ;
            $stmt->execute(array(
              ':file_name' => $file_name,
              ':nama_media' => $file_name,
              ':lokasi_media' => $folder,
              ':dateUpload' => date('Y-m-d H:i:s'),
              ':username' => $username
            ));
          } catch(PDOException $e) {
              echo $e->getMessage();
          }


      // $pesan = '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
    } else{
      // $pesan = "Proses upload eror";
    }

    $mediaUpload = $folder.$file_name;
    } else {
      $mediaUpload = NULL;
    }

    // if(!isset($error)){

      $a = 1;
          $stmt = $db->query('SELECT * FROM tbl_question');
          while($row = $stmt->fetch()){
            if($code_question == $row['code_question']) {
              $type = $row['type_question'];
              $id_question = $row['id_question'];
              $a = 0;
            } else {
              $a = 1;
            }
          }
          if ($a == 1) {
            $option = "PG";
            $stmt = $db->prepare('INSERT INTO tbl_question (type_question,code_question,option_question,media_question) VALUES (:type_question, :code_question, :option_question, :media_question)');
              $stmt->execute(array(
                ':type_question' => $type,
                ':code_question' => $_POST['code_question'],
                ':option_question' => $option,
                ':media_question' => $mediaUpload
                ));
          }
          
          //insert into database
        $stmt = $db->prepare('INSERT INTO pilihanganda (question_PG,answer_PG,type,code_question,pil1,pil2,pil3,pil4) VALUES (:question_PG, :answer_PG, :type, :code_question, :pil1, :pil2, :pil3, :pil4)') ;
        for ($i=1; $i <= $n; $i++) { 
          $stmt->execute(array(
          ':question_PG' => $_POST['question_PG'."$i"],
          ':answer_PG' => trim($_POST['answer_PG'."$i"]),
          ':type' => $type,
          ':code_question' => $_POST['code_question'],
          ':pil1' => $_POST['pil1'."$i"],
          ':pil2' => $_POST['pil2'."$i"],
          ':pil3' => $_POST['pil3'."$i"],
          ':pil4' => $_POST['pil4'."$i"]
        ));
        }
        //redirect to index page
        header('Location: question.php?action=added');
        exit;


    // }

  }

  //if form has been submitted process it
  if(isset($_POST['submitbox'])){

    //collect form data
    extract($_POST);

    //Mulai memorises data
    $file_name  = $_FILES['data_upload']['name'];
    $file_size  = $_FILES['data_upload']['size'];
    $folder   = './media/';

  if (!$_FILES['data_upload']['name'] == '') {
    
    //cari extensi file dengan menggunakan fungsi explode
    $explode  = explode('.',$file_name);
    $extensi  = $explode[count($explode)-1];

    
    //mulai memproses upload file
    if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
      //catat nama file ke database
        try {

            //insert into database
            $stmt = $db->prepare('INSERT INTO media (file_name,nama_media,lokasi_media,dateUpload,username) VALUES (:file_name, :nama_media, :lokasi_media, :dateUpload, :username)') ;
            $stmt->execute(array(
              ':file_name' => $file_name,
              ':nama_media' => $file_name,
              ':lokasi_media' => $folder,
              ':dateUpload' => date('Y-m-d H:i:s'),
              ':username' => $username
            ));
          } catch(PDOException $e) {
              echo $e->getMessage();
          }


      // $pesan = '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
    } else{
      // $pesan = "Proses upload eror";
    }

    $mediaUpload = $folder.$file_name;
    } else {
      $mediaUpload = NULL;
    }

    // if(!isset($error)){

      $a = 1;
          $stmt = $db->query('SELECT * FROM tbl_question');
          while($row = $stmt->fetch()){
            if($code_question == $row['code_question']) {
              $type = $row['type_question'];
              $id_question = $row['id_question'];
              $a = 0;
            } else {
              $a = 1;
            }
          }
          if ($a == 1) {
            $option = "Box";
            $stmt = $db->prepare('INSERT INTO tbl_question (type_question,code_question,option_question,media_question) VALUES (:type_question, :code_question, :option_question, :media_question)');
              $stmt->execute(array(
                ':type_question' => $type,
                ':code_question' => $_POST['code_question'],
                ':option_question' => $option,
                ':media_question' => $mediaUpload
                ));
          }
          
          //insert into database
          $box1 = null;
          $box2 = null;
          $box3 = null;
          $box4 = null;
          $box5 = null;
          $box6 = null;
          $jml_box = 0;
        $stmt = $db->prepare('INSERT INTO box_question (question_box,answer_box,type,code_question,media,box1,box2,box3,box4,box5,box6,jml_box) VALUES (:question_box, :answer_box, :type, :code_question, :media, :box1, :box2, :box3, :box4, :box5, :box6, :jml_box)');
        for ($i=1; $i <= $n; $i++) {
          if (!$_POST['box1'."$i"] == "") {
            $box1 = $_POST['box1'."$i"];
            $jml_box = $jml_box + 1;
          } else {
            $box1 = null;
          }

          if (!$_POST['box2'."$i"] == "") {
            $box2 = $_POST['box2'."$i"];
            $jml_box = $jml_box + 1;
          } else {
            $box2 = null;
          }

          if (!$_POST['box3'."$i"] == "") {
            $box3 = $_POST['box3'."$i"];
            $jml_box = $jml_box + 1;
          } else {
            $box3 = null;
          }

          if (!$_POST['box4'."$i"] == "") {
            $box4 = $_POST['box4'."$i"];
            $jml_box = $jml_box + 1;
          } else {
            $box4 = null;
          }

          if (!$_POST['box5'."$i"] == "") {
            $box5 = $_POST['box5'."$i"];
            $jml_box = $jml_box + 1;
          } else {
            $box5 = null;
          }
          if (!$_POST['box6'."$i"] == "") {
            $box6 = $_POST['box6'."$i"];
            $jml_box = $jml_box + 1;
          } else {
            $box6 = null;
          }
         
          $stmt->execute(array(
          ':question_box' => $_POST['question_box'."$i"],
          ':answer_box' => trim($_POST['answer_box']."$i"),
          ':type' => $type,
          ':code_question' => $_POST['code_question'],
          ':media' => null,
          ':box1' => $_POST['box1'."$i"],
          ':box2' => $box2,
          ':box3' => $box3,
          ':box4' => $box4,
          ':box5' => $box5,
          ':box6' => $box6,
          ':jml_box' => $jml_box
        ));
        }
        //redirect to index page
        header('Location: question.php?action=added');
        exit;


    // }

  }

  // //check for any errors
  // if(isset($error)){
  //   foreach($error as $error){
  //     echo '<p class="error">'.$error.'</p>';
  //   }
  // }
  
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
                      <legend>Input Question</legend>
              </div>
              <div class="panel-body">
                <div id="rootwizard">
                <div class="navbar">
                  <div class="navbar-inner">
                    <div class="container">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#tab1" data-toggle="tab">Essai</a></li>
                  <li><a href="#tab2" data-toggle="tab">Multiple Choice</a></li>
                  <li><a href="#tab3" data-toggle="tab">Question Box</a></li>
                  <li><a href="#tab4" data-toggle="tab">Media</a></li>
                </ul>
                 </div>
                  </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                        <fieldset>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Code Question</label>
                          <div class="col-sm-9">
                            <input type="text" name="code_question" class="form-control" placeholder="Code Question">
                          </div>
                          <label class="col-md-3 control-label" for="select-1">Type</label>
                            <div class="col-md-9">
                              <select class="form-control" id="select-1" name="type">
                                <option value="Listening">Listening</option>
                                <option value="Reading" selected="selected">Reading</option>
                                <option value="Grammar">Grammar</option>
                              </select> 
                            </div>
                            <label class="col-md-3 control-label">Choose File</label>
                            <div class="col-md-9">
                              <input type="file" name="data_upload" />
                              <p class="help-block">
                                *Optional
                              </p>
                            </div>
                          </div>
                        </fieldset>
                            <?php for ($i=1; $i <= $n; $i++) { 
                              # code...
                             ?>
                      <fieldset>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Question <?php echo $i; ?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="question_essai<?php echo $i; ?>" placeholder="Question" rows="3"></textarea>
                          </div>
                          <label class="col-sm-2 control-label">Answer <?php echo $i; ?></label>
                          <div class="col-sm-10">
                            <textarea name="answer_essai<?php echo $i; ?>" class="form-control" placeholder="Answers Here" rows="3"></textarea>
                          </div>
                          </div>
                          </fieldset>
                          <?php } ?>
                        <div class="col-md-10">
                        <input type="Submit" name="submitEssai" class="btn btn-primary">
                        </div>
                      </form>
                      </div>
                    </div>

                    <div class="tab-pane" id="tab2">
                      <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                        <fieldset>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Code Question</label>
                          <div class="col-sm-9">
                            <input type="text" name="code_question" class="form-control" placeholder="Code Question">
                          </div>
                          <label class="col-md-3 control-label" for="select-1">Type</label>
                            <div class="col-md-9">
                              <select class="form-control" id="select-1" name="type">
                                <option value="Listening">Listening</option>
                                <option value="Reading" selected="selected">Reading</option>
                                <option value="Grammar">Grammar</option>
                              </select> 
                            </div>
                            <label class="col-md-3 control-label">Choose File</label>
                            <div class="col-md-9">
                              <input type="file" name="data_upload" />
                              <p class="help-block">
                                *Optional
                              </p>
                            </div>
                          </div>
                        </fieldset>
                            <?php for ($i=1; $i <= $n; $i++) { 
                              # code...
                             ?>
                      <fieldset>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Question <?php echo $i; ?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="question_PG<?php echo $i; ?>" placeholder="Question" rows="3"></textarea>
                          </div>
                          <label class="col-sm-2 control-label">A : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil1<?php echo $i; ?>" class="form-control" placeholder="Choice A">
                          </div>
                          <label class="col-sm-2 control-label">B : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil2<?php echo $i; ?>" class="form-control" placeholder="Choice B">
                          </div>
                          <label class="col-sm-2 control-label">C : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil3<?php echo $i; ?>" class="form-control" placeholder="Choice C">
                          </div>
                          <label class="col-sm-2 control-label">D : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil4<?php echo $i; ?>" class="form-control" placeholder="Choice D">
                          </div>
                          <label class="col-sm-2 control-label">Answer <?php echo $i; ?></label>
                          <div class="col-sm-10">
                            <input type="text" name="answer_PG<?php echo $i; ?>" class="form-control" placeholder="Answer">
                          </div>
                          </div>
                          </fieldset>
                          <?php } ?>
                        <div class="col-md-10">
                        <input type="Submit" name="submitPG" class="btn btn-primary">
                        </div>
                      </form>
                      </div>
                    </div>

                    <div class="tab-pane" id="tab3">
                      <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                        <fieldset>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Code Question</label>
                          <div class="col-sm-9">
                            <input type="text" name="code_question" class="form-control" placeholder="Code Question">
                          </div>
                          <label class="col-md-3 control-label" for="select-1">Type</label>
                            <div class="col-md-9">
                              <select class="form-control" id="select-1" name="type">
                                <option value="Listening">Listening</option>
                                <option value="Reading" selected="selected">Reading</option>
                                <option value="Grammar">Grammar</option>
                              </select> 
                            </div>
                            <label class="col-md-3 control-label">Choose File</label>
                            <div class="col-md-9">
                              <input type="file" name="data_upload" />
                              <p class="help-block">
                                *Optional
                              </p>
                            </div>
                          </div>
                        </fieldset>
                            <?php for ($i=1; $i <= $n; $i++) { 
                              # code...
                             ?>
                      <fieldset>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Question <?php echo $i; ?></label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="question_box<?php echo $i; ?>" placeholder="Question" rows="3"></textarea>
                          </div>
                          <label class="col-sm-2 control-label">BOX 1 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box1<?php echo $i; ?>" class="form-control" placeholder="Content Box 1">
                          </div>
                          <label class="col-sm-2 control-label">BOX 2 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box2<?php echo $i; ?>" class="form-control" placeholder="Content Box 2">
                          </div>
                          <label class="col-sm-2 control-label">BOX 3 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box3<?php echo $i; ?>" class="form-control" placeholder="Content Box 3">
                          </div>
                          <label class="col-sm-2 control-label">BOX 4 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box4<?php echo $i; ?>" class="form-control" placeholder="Content Box 4">
                          </div>
                          <label class="col-sm-2 control-label">BOX 5 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box5<?php echo $i; ?>" class="form-control" placeholder="Content Box 5">
                          </div>
                          <label class="col-sm-2 control-label">BOX 6 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box6<?php echo $i; ?>" class="form-control" placeholder="Content Box 6">
                          </div>
                          <label class="col-sm-2 control-label">Answer <?php echo $i; ?></label>
                          <div class="col-sm-10">
                            <input type="text" name="answer_box<?php echo $i; ?>" class="form-control" placeholder="Answer">
                          </div>
                          </div>
                          </fieldset>
                          <?php } ?>
                        <div class="col-md-10">
                        <input type="Submit" name="submitbox" class="btn btn-primary">
                        </div>
                      </form>
                      </div>
                    </div>

                  <div class="tab-pane" id="tab4">
                  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <fieldset>
                      <legend>Upload Media</legend>
                      <div class="form-group">
                      <?php echo '<div id="eror">'.$pesan.'</div>'; ?>
                      <label class="col-md-2 control-label">Choose File</label>
                      <div class="col-md-10">
                        <input type="file" name="data_upload" />
                        <p class="help-block">
                          flash file.
                        </p>
                      </div>
                      <label class="col-md-2 control-label">File Name</label>
                      <div class="col-md-10">
                        <input type="text" name="fileName" class="form-control">
                      </div>
                    </div>
                    <div>
                      
                    </fieldset>
                    <input type="submit" name="uploadFile" value="Upload" class="btn btn-primary">
                    </form>
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

     <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>
    <script src="vendors/select/bootstrap-select.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

    <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
    <script src="js/forms.js"></script>
  </body>
</html>