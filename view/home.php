
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
	 $read=$db->query('SELECT * FROM posts LIMIT 0,5 DESC');
	while($data = $read->fetch()){
echo $data['title'] . "By" . $data['author'] . "<br/>" . $data['content'] . "<br/>"; 	
}
	
?>

  </body>
</html>

