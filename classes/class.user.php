<?php

include('class.password.php');

class User extends Password{

    private $db;
	
	function __construct($db){
		parent::__construct();
	
		$this->_db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}



	private function get_user_hash($username){	

		try {

			$stmt = $this->_db->prepare('SELECT * FROM users WHERE username = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	private function get_answer($kode){	

		try {

			$stmt = $this->_db->prepare('SELECT * FROM tbl_question WHERE code_question = :code_question');
			$stmt->execute(array('code_question' => $kode));
			
			$row = $stmt->fetch();
			return $row['answer'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	
	public function login($username,$password){	

		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
		    
		    $stmt = $this->_db->prepare('SELECT * FROM users WHERE username = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
		    $_SESSION['loggedin'] = $row['userID'];
		    return true;
		}		
	}

	public function cek_level($userID){
			$stmt = $this->_db->prepare('SELECT * FROM users WHERE userID = :userID');
			$stmt->execute(array('userID' => $userID));
			
			$row = $stmt->fetch();
			
			return $row['type_user'];
	}

		
	public function logout(){
		session_destroy();
	}
	
}


?>