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
  <?php
		include("includes/template/admin_header.php");
		?>

		<div class="forma">

		<center>
		<br>
		<h3>Shto Abonime</h3>
		</center>
	<form method="post" action="">
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
	
	 $sql = "INSERT INTO `abonimi`(`id`, `lloji`) VALUES ('$id','$emri')";
		 if (mysqli_query($conn, $sql)) {
		echo "Kategoria u shtua me sukses !";
					header("location:abonimet.php");

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>

  </body>
</html>