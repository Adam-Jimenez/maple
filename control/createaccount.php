<?php

include_once("model/create.class.php");
if(isset($_POST['username'])){
$username=mysql_real_escape_string($_POST['username']);
}
if(isset($_POST['password'])){
$password= sha1(mysql_real_escape_string($_POST['password']));
}
if(isset($_POST['email'])){
$email= mysql_real_escape_string($_POST['email']);
}
if(isset($_POST['reload'])){
	$reload= 1;
}
else
{
	$reload=0;
}

if(isset($username) AND  isset($password) AND isset($email) ){
	
	$create = new create();
	$unique= $create->verifyUnique($username,$email);
	if ($unique){
		$create->insertIntoDatabase($username,$password,$email);
		echo "Successfully created!";
	}else{
		echo "Username/email already taken";
	}	
}	
else{
	include_once("view/createacc.php");
}


?>
