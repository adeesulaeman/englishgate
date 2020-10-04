<?php
$userID = $_SESSION['loggedin'];

  $stmt = $db->prepare('SELECT * FROM users WHERE userID = :userID');
  $stmt->execute(array(':userID' => $userID));
  $row = $stmt->fetch(); 
  $username = $row['username'];

//Buat konfigurasi upload
//Folder tujuan upload file
$eror		= false;
$pesan = "";
//type file yang bisa diupload
$file_type	= array('jpg','jpeg','png','gif','avi','swf','mpeg');
//tukuran maximum file yang dapat diupload
$max_size	= 10000000; // 10MB
if(isset($_POST['uploadFile'])){
	//Mulai memorises data
	$file_name	= $_FILES['data_upload']['name'];
	$file_size	= $_FILES['data_upload']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		$eror   = true;
		$pesan .= 'Type file yang anda upload tidak sesuai<br />';
	}
	if($file_size > $max_size){
		$eror   = true;
		$pesan .= 'Ukuran file melebihi batas maximum<br />';
	}
	//check ukuran file apakah sudah sesuai

	if($eror == true){
		$pesan = $pesan;
	}
	else{
		$folder		= './media/';
		//mulai memproses upload file
		if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
			//catat nama file ke database
				try {

		        //insert into database
		        $stmt = $db->prepare('INSERT INTO media (file_name,nama_media,lokasi_media,dateUpload,username) VALUES (:file_name, :nama_media, :lokasi_media, :dateUpload, :username)') ;
		        $stmt->execute(array(
		          ':file_name' => $file_name,
		          ':nama_media' => $_POST['fileName'],
		          ':lokasi_media' => $folder,
		          ':dateUpload' => date('Y-m-d H:i:s'),
		          ':username' => $username
		        ));

		        //redirect to index page
		        header('Location: question.php?action=added');
		        exit;

		      } catch(PDOException $e) {
		          echo $e->getMessage();
		      }


			// $pesan = '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
		} else{
			$pesan = "Proses upload eror";
		}
	}
}
?>