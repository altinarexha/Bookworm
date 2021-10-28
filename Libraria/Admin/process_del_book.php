<?php
require('includes/connect.php');

			$query2="delete from libri_ka_kategori where libri_id=".$_GET['id'];
			$query="delete from librat where id=".$_GET['id'];

			$del=mysqli_query($conn,$query2) or die("can't Execute...");
			$del2=mysqli_query($conn,$query) or die("can't Execute...");
			if ($del&&$del2){

			header("location:librat.php");}

?>