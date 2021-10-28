<?php

	require('includes/connect.php');
			
			$query="delete from kerkesa where id =".$_GET['id'];
		
			mysqli_query($conn,$query) or die("can't Execute...");
			
			
			header("location:mesazhet.php");

?>