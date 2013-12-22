<?php 
session_start();
$title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
$content = mysql_real_escape_string(htmlspecialchars($_POST['content']));
try{

	$db= new PDO('mysql:host=localhost;dbname=adambook','root','');
}
catch (Exception $e)
{
	die("Error: " . $e->getMessage());
}
$addpost = $db->prepare('INSERT INTO posts(title,content,author,date) VALUES(:title, :content, :author, CURDATE())');

$addpost->execute(array('title' => $title, 
'content' => $content, 
'author' => $_SESSION['username']));
 
$addpost->closeCursor();

header("Location: ../main.php");
?>
