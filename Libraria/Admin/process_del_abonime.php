<?php
require('includes/connect.php');


			$query="delete from abonimi where id=".$_GET['id'];
		
			mysqli_query($conn,$query) or die("can't Execute...");

			header("location:abonimet.php");

?>