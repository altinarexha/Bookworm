<?php

session_start();

include_once 'includes/connect.php';

?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="Style/style.css">

	</head>
	  <body>

	<!-- start header -->
<div id="header">
	<div id="menu">
		<?php
			include("includes/template/admin_header.php");
		?>
	</div>
</div>
<div id="logo-wrap">
<div id="logo">
		<?php
		//	include("includes/logo.inc.php");
		?>
</div>
</div>
  

		<div class="forma">

		<center>
		<br>
		<h3>Shto Kategori</h3>
		</center>
	<form method="post" action="">
		<br>
		<b>Id:</b><br>

		<input type="text" name="id" placeholder="Sheno Id">
		<br>
		<b>Emri:</b><br>

		<input type="text" name="emri" placeholder="Sheno emrin">
		<br>
		<br>
		<center>
		<input class="btn" type="submit" name="save" value="Shto">
	   <br>
	</form>
	</div>
	</div>
	</div>
	<?php
if(isset($_POST['save']))
{	 
	 $id = $_POST['id'];
	 $emri = $_POST['emri'];
	
	 $sql = "INSERT INTO `kategori`(`id`, `emri`) VALUES ('$id','$emri')";
		 if (mysqli_query($conn, $sql)) {
		echo "Kategoria u shtua me sukses !";
					header("location:kategorite.php");

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>

  </body>
</html>