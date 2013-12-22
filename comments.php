<?php
$post_id=0; 
if(isset($_GET['id'])){
	$post_id=mysql_real_escape_string($_GET['id']);
}

try{
	$db = new PDO('mysql:host=localhost;dbname=adambook', 'root', '');
}
catch(Exception $e){
	die("error" . $e->getMessage());
}

$post = $db->prepare('SELECT * FROM posts WHERE ID = :postid');
$post->execute(array('postid' => $post_id));

$data = $post->fetch();
$post->closeCursor();
$comments = $db->prepare('SELECT * FROM comments WHERE post_ID = :postid ORDER BY date DESC');
$comments->execute(array('postid' => $post_id));


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
	<!--link rel="stylesheet" href="style.css">
    <script src="script.js"></script>-->
  </head>
  <body>
<?php echo $data['title'] . " By " . $data['author'] . "<br/>" . $data['content'] . "<br/>" . "<i>" . $data['date'] . "</i>" . '&#09;' . '<a href="main.php">Back to Home</a>' . "<br/><br/>";

while($cdata = $comments->fetch()){
	echo $cdata['date'] . '   ' . $cdata['author'] . ': ' . $cdata['content'];
}
$comments->closeCursor();
?> 
<form action="control/addcomment.php" method="post">
<textarea name="content"></textarea>
<input type="hidden" value="<?php echo $post_id;?>" name="post_id" />
<input type="submit" value="Submit"/> 
</form>
  </body>
</html>

