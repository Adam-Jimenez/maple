<?php 
session_start();

$db = new PDO("mysql:host=localhost;dbname=adambook" , 'root', '');
include_once("model/login.class.php");

$username=mysql_real_escape_string($_POST['username']);

$password=sha1(mysql_real_escape_string($_POST['password']));

$login = new login();

if($login->verify($username, $password)){
	//login successful
	$_SESSION['username']=$username;
 	$_SESSION['passhash']=$password;
	include("view/home.php");

}
else{
	echo "Wrong account information" ;
}


?>
