<?php
try{
$db = new PDO('mysql:host=localhost;dbname=adambook', 'root', ''); 
}
catch(Exception $e)
{
	die('erreur: '.$e->getMessage());
}
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
	Hi! <?php echo $_SESSION['username'];
	 $read=$db->query('SELECT * FROM posts ORDER BY date DESC LIMIT 0,5');
	while($data = $read->fetch()){
echo $data['title'] . " By " . $data['author'] . "<br/>" . $data['content'] . "<br/>" . "<i>" . $data['date'] . "</i>" . '<a href="comments.php?id=' . $data['ID'] .'" >Comments</a>' ; 	
}
	
?>

<form action="control/addpost.php" method="post">

<input type="text" name="title">
<textarea name="content"></textarea>
<input type="submit" value="Submit">
</form>

  </body>
</html>

