<?php


class login{
	
		


	public function verify($user, $pass){
		
		
		$db = new PDO('mysql:host=localhost;dbname=adambook', 'root' , '');
		
		$connect = $db->prepare('SELECT username,password FROM accountinfo WHERE username = :username AND password = :password');
		$connect->execute(array('username' => $user, 'password' => $pass));
		
		$retrieved = $connect->fetch();

		$connect->closeCursor();	
		if($retrieved ){
			return true;
		}
		else{
			
			return false;
		}
		

	}




}


?>
