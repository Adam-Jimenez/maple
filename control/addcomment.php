<?
session_start();
$content = mysql_real_escape_string(htmlspecialchars($_POST['content']));
$post_id = $_POST['post_id'];
try{
	$db = new PDO("mysql:host=localhost;dbname=adambook", "root", "");
}
catch(Exception $e){
	die("Error: ". $e->getMessage());
}

$addc = $db->prepare('INSERT INTO comments(post_ID,author,content,date) VALUES(:post_id, :author, :content, CURDATE())');
$addc->execute(array('post_id'=> $post_id, 'author' => $_SESSION['username'],
 'content' => $content));

$addc->closeCursor();


header("Location:../comments.php?id=" . $post_id);


