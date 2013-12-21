<?php

class create{

	public function insertIntoDatabase($username,$password,$email){

	$db = new PDO("mysql:host=localhost;dbname=adambook" ,'root', '');
	$insert= $db->prepare('INSERT INTO accountinfo(username,password,email,datecreation) VALUES(:username, :password, :email, CURDATE())');
	$insert->execute(array(
	'username' => $username,
	'password' => $password,
	'email' => $email));
	$insert->closeCursor();
	

}
	public function verifyUnique($username,$email){
	
	$db = new PDO("mysql:host=localhost;dbname=adambook" ,'root', '');


	$query = $db->prepare('SELECT username, email FROM accountinfo WHERE username = :username OR email = :email');

	$query->execute(array('username' => $username, 'email'=>$email));

	$retrieve = $query->fetch();
	$query->closeCursor();

	if(!$retrieve ){
		return true;

	}
	else{
		return false; 
	}	
	
	
	
}




}


?>
