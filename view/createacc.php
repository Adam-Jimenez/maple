
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
	<!--link rel="stylesheet" href="style.css">
    <script src="script.js"></script>-->
  </head>
  <body>

	<form action="createacc.php" method="post">
		
		<table  width="40%" height = "320px">
		<tr>	
			<td colspan="2"><h1>Create your account</h1>
		</tr>
		<tr >
			<td> Username: </td>
			<td> <input type="text" name="username" />
		</tr>
		<tr >
			<td> Password: </td> 
			<td><input type="password" name="password" />
		
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email" />
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Create!"/></td>
		</tr> 
		</table>
		<?php if($reload!=0){ ?> <p>Wrong Credentials</p> <?php } ?>
		<input type="hidden" name="reload" value="<?php echo $reload; ?>" />
	
	</form>

  </body>
</html>

