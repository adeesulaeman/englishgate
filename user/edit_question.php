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


    //very basic validation
    if($code_question ==''){
      $error[] = 'Please enter the code Question';
    }

    if($question_essai ==''){
      $error[] = 'Please enter Question';
    }

    if(!isset($error)){

      try {

        //insert into database
        $stmt = $db->prepare('UPDATE essai set question_essai = :question_essai, answer_essai = :answer_essai, type = :type, code_question = :code_question, media = :media   WHERE id_essai = :id_essai') ;
        $stmt->execute(array(
          ':question_essai' => $question_essai,
          ':answer_essai' => $answer_essai,
          ':type' => $type,
          ':code_question' => $code_question,
          ':media' => $mediaUpload,
          ':id_essai' => $id_essai
        ));

        //redirect to index page
        header('Location: question_essai.php?action=updated');
        exit;

      } catch(PDOException $e) {
          echo $e->getMessage();
      }

    }

  }

  //if form has been submitted process it
  if(isset($_POST['submitQuestion'])){

    $_POST = array_map( 'stripslashes', $_POST );

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


    if(!isset($error)){

      try {

        //insert into database
        $stmt = $db->prepare('UPDATE tbl_question set type_question = :type_question, code_question = :code_question, option_question = :option_question, media_question = :media_question   WHERE id_question = :id_question') ;
        $stmt->execute(array(
          ':type_question' => $type,
          ':code_question' => $code_question,
          ':option_question' => $option,
          ':media_question' => $mediaUpload,
          ':id_question' => $id_question
        ));

        //redirect to index page
        header('Location: question.php?action=updated');
        exit;

      } catch(PDOException $e) {
          echo $e->getMessage();
      }

    }

  }


    //if form has been submitted process it
  if(isset($_POST['answerPG'])){

    $_POST = array_map( 'stripslashes', $_POST );

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


    //very basic validation
    if($code_question ==''){
      $error[] = 'Please enter the code Question';
    }

    if($question_PG ==''){
      $error[] = 'Please enter Question';
    }

    if(!isset($error)){

      try {

        //insert into database
        $stmt = $db->prepare('UPDATE pilihanganda set question_PG = :question_PG, answer_PG = :answer_PG, type = :type, code_question = :code_question, pil1 = :pil1, pil2 = :pil2, pil3 = :pil3, pil4 = :pil4, media = :media   WHERE id_PG = :id_PG') ;
        $stmt->execute(array(
          ':question_PG' => $question_PG,
          ':answer_PG' => $answer_PG,
          ':type' => $type,
          ':code_question' => $code_question,
          'pil1' => $pil1,
          ':pil2' => $pil2,
          ':pil3' => $pil3,
          ':pil4' => $pil4,
          ':media' => $mediaUpload,
          ':id_PG' => $id_PG
        ));

        //redirect to index page
        header('Location: question_PG.php?action=updated');
        exit;

      } catch(PDOException $e) {
          echo $e->getMessage();
      }

    }

  }

  //if form has been submitted process it
  if(isset($_POST['answerBOX'])){

    $_POST = array_map( 'stripslashes', $_POST );

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


    //very basic validation
    if($code_question ==''){
      $error[] = 'Please enter the code Question';
    }

    if($question_box ==''){
      $error[] = 'Please enter Question';
    }

    if(!isset($error)){

      try {

        //insert into database
          $box1 = null;
          $box2 = null;
          $box3 = null;
          $box4 = null;
          $box5 = null;
          $box6 = null;
          $jml_box = 0;
        $stmt = $db->prepare('UPDATE box_question set question_box = :question_box, answer_box = :answer_box, type = :type, code_question = :code_question, media = :media, box1 = :box1, box2 = :box2, box3 = :box3, box4 = :box4, box5 = :box5, box6 = :box6, jml_box = :jml_box WHERE id_box = :id_box') ;

          if (!$_POST['box1'] == "") {
            $box1 = $_POST['box1'];
            $jml_box = $jml_box + 1;
          } else {
            $box1 = null;
          }

          if (!$_POST['box2'] == "") {
            $box2 = $_POST['box2'];
            $jml_box = $jml_box + 1;
          } else {
            $box2 = null;
          }

          if (!$_POST['box3'] == "") {
            $box3 = $_POST['box3'];
            $jml_box = $jml_box + 1;
          } else {
            $box3 = null;
          }

          if (!$_POST['box4'] == "") {
            $box4 = $_POST['box4'];
            $jml_box = $jml_box + 1;
          } else {
            $box4 = null;
          }

          if (!$_POST['box5'] == "") {
            $box5 = $_POST['box5'];
            $jml_box = $jml_box + 1;
          } else {
            $box5 = null;
          }
          if (!$_POST['box6'] == "") {
            $box6 = $_POST['box6'];
            $jml_box = $jml_box + 1;
          } else {
            $box6 = null;
          }

        $stmt->execute(array(
          ':question_box' => $question_box,
          ':answer_box' => $answer_box,
          ':type' => $type,
          ':code_question' => $code_question,
          ':media' => $mediaUpload,
          ':box1' => $box1,
          ':box2' => $box2,
          ':box3' => $box3,
          ':box4' => $box4,
          ':box5' => $box5,
          ':box6' => $box6,
          ':jml_box' => $jml_box,
          ':id_box' => $id_box
        ));

        //redirect to index page
        header('Location: question_box.php?action=updated');
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
  
  if ($_GET['type'] == 'essai') {
    try {
      $stmt = $db->prepare('SELECT * FROM essai WHERE id_essai = :id_essai') ;
      $stmt->execute(array(':id_essai' => $_GET['id']));
      $row = $stmt->fetch(); 

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  } elseif ($_GET['type'] == 'PG') {
    try {
      $stmt = $db->prepare('SELECT * FROM pilihanganda WHERE id_PG = :id_PG') ;
      $stmt->execute(array(':id_PG' => $_GET['id']));
      $row = $stmt->fetch(); 

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  } elseif ($_GET['type'] == 'BOX') {
    try {
      $stmt = $db->prepare('SELECT * FROM box_question WHERE id_box = :id_box') ;
      $stmt->execute(array(':id_box' => $_GET['id']));
      $row = $stmt->fetch(); 

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  } elseif ($_GET['type'] == 'question') {
    try {
      $stmt = $db->prepare('SELECT * FROM tbl_question WHERE id_question = :id_question') ;
      $stmt->execute(array(':id_question' => $_GET['id']));
      $row = $stmt->fetch(); 

    } catch(PDOException $e) {
        echo $e->getMessage();
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
                      <legend>Edit Question</legend>
                </div>
          <?php if ($_GET['type'] == 'essai') {
          ?>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                  <input type='hidden' name='id_essai' value='<?php echo $row['id_essai'];?>'>
                  <fieldset>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Code Question</label>
                    <div class="col-sm-10">
                      <input type="text" name="code_question" class="form-control" id="inputEmail3" value="<?php echo $row['code_question'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Question</label>
                    <div class="col-sm-10">
                      <input type="text" name="question_essai" class="form-control" id="inputEmail3" value="<?php echo $row['question_essai'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Answer</label>
                    <div class="col-sm-10">
                      <input type="text" name="answer_essai" class="form-control" id="inputEmail3" value="<?php echo $row['answer_essai'];?>">
                    </div>
                  </div>
                  <?php
                  $Listening = "";
                  $Reading = "";
                  $Grammar = "";
                  if ($row['type'] == "Listening") {
                    $Listening = "selected";
                  } elseif ($row['type'] == "Reading") {
                    $Reading = "selected";
                  } else {
                    $Grammar = "selected";
                  }
                  ?>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="select-1">Type</label>
                      <div class="col-md-10">
                        <select class="form-control" id="select-1" name="type">
                          <option value="Listening" <?php echo $Listening; ?>>Listening</option>
                          <option value="Reading" <?php echo $Reading; ?>>Reading</option>
                          <option value="Grammar" <?php echo $Grammar; ?>>Grammar</option>
                        </select> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Choose File</label>
                            <div class="col-md-10">
                              <input type="file" name="data_upload" />
                              <p class="help-block">
                                *Optional
                              </p>
                            </div>
                      </div>
                    </fieldset>
                  <div class="col-md-10">
                  <input type="Submit" name="submit" class="btn btn-primary">
                  </div>
                </form>
                </div>
            <?php } elseif ($_GET['type'] == 'question') {
          ?>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                  <input type='hidden' name='id_question' value='<?php echo $row['id_question'];?>'>
                  <fieldset>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Code Question</label>
                    <div class="col-sm-10">
                      <input type="text" name="code_question" class="form-control" id="inputEmail3" value="<?php echo $row['code_question'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Option</label>
                    <div class="col-sm-10">
                      <input type="text" name="option" class="form-control" id="inputEmail3" value="<?php echo $row['option_question'];?>">
                    </div>
                  </div>
                  <?php
                  $Listening = "";
                  $Reading = "";
                  $Grammar = "";
                  if ($row['type_question'] == "Listening") {
                    $Listening = "selected";
                  } elseif ($row['type_question'] == "Reading") {
                    $Reading = "selected";
                  } else {
                    $Grammar = "selected";
                  }
                  ?>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="select-1">Type</label>
                      <div class="col-md-10">
                        <select class="form-control" id="select-1" name="type">
                          <option value="Listening" <?php echo $Listening; ?>>Listening</option>
                          <option value="Reading" <?php echo $Reading; ?>>Reading</option>
                          <option value="Grammar" <?php echo $Grammar; ?>>Grammar</option>
                        </select> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Choose File</label>
                            <div class="col-md-10">
                              <input type="file" name="data_upload" />
                              <p class="help-block">
                                *Optional
                              </p>
                            </div>
                      </div>
                    </fieldset>
                  <div class="col-md-10">
                  <input type="Submit" name="submitQuestion" class="btn btn-primary">
                  </div>
                </form>
                </div>
            <?php } elseif ($_GET['type'] == 'PG') { ?>


                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                  <input type='hidden' name='id_PG' value='<?php echo $row['id_PG'];?>'>
                  <fieldset>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Code Question</label>
                    <div class="col-sm-10">
                      <input type="text" name="code_question" class="form-control" id="inputEmail3" value="<?php echo $row['code_question'];?>">
                    </div>
                  </div>
                  <?php
                  $Listening = "";
                  $Reading = "";
                  $Grammar = "";
                  if ($row['type'] == "Listening") {
                    $Listening = "selected";
                  } elseif ($row['type'] == "Reading") {
                    $Reading = "selected";
                  } else {
                    $Grammar = "selected";
                  }
                  ?>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="select-1">Type</label>
                      <div class="col-md-10">
                        <select class="form-control" id="select-1" name="type">
                          <option value="Listening" <?php echo $Listening; ?>>Listening</option>
                          <option value="Reading" <?php echo $Reading; ?>>Reading</option>
                          <option value="Grammar" <?php echo $Grammar; ?>>Grammar</option>
                        </select> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Choose File</label>
                            <div class="col-md-10">
                              <input type="file" name="data_upload" />
                              <p class="help-block">
                                *Optional
                              </p>
                            </div>
                      </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Question</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="question_PG" rows="3"><?php echo $row['question_PG'];?></textarea>
                          </div>
                          <label class="col-sm-2 control-label">A : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil1" class="form-control" value="<?php echo $row['pil1'];?>">
                          </div>
                          <label class="col-sm-2 control-label">B : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil2" class="form-control" value="<?php echo $row['pil2'];?>">
                          </div>
                          <label class="col-sm-2 control-label">C : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil3" class="form-control" value="<?php echo $row['pil3'];?>">
                          </div>
                          <label class="col-sm-2 control-label">D : </label>
                          <div class="col-sm-10">
                            <input type="text" name="pil4" class="form-control" value="<?php echo $row['pil4'];?>">
                          </div>
                        </div>
                        <div class="form-group">
                      <label class="col-md-2 control-label" for="select-1">Answer</label>
                            <div class="col-md-10">
                              <select class="form-control" id="select-1" name="answer_PG">
                              <option value="<?php NULL ?>" selected=""> </option>
                                <option value="<?php echo $row['pil1'];?>"><?php echo $row['pil1'];?></option>
                                <option value="<?php echo $row['pil2'];?>"><?php echo $row['pil2'];?></option>
                                <option value="<?php echo $row['pil3'];?>"><?php echo $row['pil3'];?></option>
                                <option value="<?php echo $row['pil4'];?>"><?php echo $row['pil4'];?></option>
                              </select> 
                            </div>
                      </div>
                    </fieldset>
                  <div class="col-md-10">
                  <input type="Submit" name="answerPG" class="btn btn-primary">
                  </div>
                </form>
                </div>
         <?php   } elseif ($_GET['type'] == 'BOX') { ?>
                  <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                  <input type='hidden' name='id_box' value='<?php echo $row['id_box'];?>'>
                  <fieldset>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Code Question</label>
                    <div class="col-sm-10">
                      <input type="text" name="code_question" class="form-control" id="inputEmail3" value="<?php echo $row['code_question'];?>">
                    </div>
                  </div>
                  <?php
                  $Listening = "";
                  $Reading = "";
                  $Grammar = "";
                  if ($row['type'] == "Listening") {
                    $Listening = "selected";
                  } elseif ($row['type'] == "Reading") {
                    $Reading = "selected";
                  } else {
                    $Grammar = "selected";
                  }
                  ?>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="select-1">Type</label>
                      <div class="col-md-10">
                        <select class="form-control" id="select-1" name="type">
                          <option value="Listening" <?php echo $Listening; ?>>Listening</option>
                          <option value="Reading" <?php echo $Reading; ?>>Reading</option>
                          <option value="Grammar" <?php echo $Grammar; ?>>Grammar</option>
                        </select> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Choose File</label>
                            <div class="col-md-10">
                              <input type="file" name="data_upload" />
                              <p class="help-block">
                                *Optional
                              </p>
                            </div>
                      </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Question</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="question_box" rows="3"><?php echo $row['question_box'];?></textarea>
                          </div>
                          <label class="col-sm-2 control-label">1 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box1" class="form-control" value="<?php echo $row['box1'];?>">
                          </div>
                          <label class="col-sm-2 control-label">2 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box2" class="form-control" value="<?php echo $row['box2'];?>">
                          </div>
                          <label class="col-sm-2 control-label">3 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box3" class="form-control" value="<?php echo $row['box3'];?>">
                          </div>
                          <label class="col-sm-2 control-label">4 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box4" class="form-control" value="<?php echo $row['box4'];?>">
                          </div>
                          <label class="col-sm-2 control-label">5 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box5" class="form-control" value="<?php echo $row['box5'];?>">
                          </div>
                          <label class="col-sm-2 control-label">6 : </label>
                          <div class="col-sm-10">
                            <input type="text" name="box6" class="form-control" value="<?php echo $row['box6'];?>">
                          </div>
<label class="col-sm-2 control-label">Answer </label>
                          <div class="col-sm-10">
                            <input type="text" name="answer_box" class="form-control" value="<?php echo $row['answer_box'];?>">
                          </div>
                        </div>
                    </fieldset>
                  <div class="col-md-10">
                  <input type="Submit" name="answerBOX" class="btn btn-primary">
                  </div>
                </form>
                </div>
         <?php } else {
          echo "No Available";
          } ?>
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