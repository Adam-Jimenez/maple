<?php 
session_start();

$db = new PDO("mysql:host=localhost;dbname=adambook" , 'root', '');
include_once("model/login.class.php");
if(isset($_POST['username'])){
$username=mysql_real_escape_string($_POST['username']);
}
if(isset($_POST['password'])){
$password=sha1(mysql_real_escape_string($_POST['password']));
}
$login = new login();
if(!isset($_SESSION['username']) AND !isset($_SESSION['passhash'])){
if($login->verify($username, $password)){
	//login successful
	$_SESSION['username']=$username;
 	$_SESSION['passhash']=$password;
	include("view/home.php");

}
else{
	echo "Wrong account information" ;
}
}else{
if($login->verify($_SESSION['username'], $_SESSION['passhash'])){
	include("view/home.php");

}


}






?>
