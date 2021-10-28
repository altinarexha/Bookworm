<?php 
session_start();
require ('includes/connect.php');

	$q="select * from perdoruesi";
	 $res=mysqli_query($conn,$q) or die("Can't Execute Query...");
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="Style/style.css">

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

		<?php
		include("includes/template/admin_header.php");
		?>
		
</head>
<body>

	<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				
					<table  WIDTH='100%'>
					<tr>
						<td colspan="10"><a class="btn" href="abonimet_e_perdoruesit.php">Shiko abonimet e perdoruesve</a></td>
						</tr>
						
						
						<tr>
<td ><b><u>SR.NO</u></b></td>
<TD ><b><u>Emri</u></b></TD>
<TD ><b><u>Mbiemri</u></b></TD>
<TD ><b><u>Username</u></b></TD>
<TD ><b><u>Email</u></b></TD>
			
				

							
						</tr>
						<?php
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['emri'].'
										<td>'.$row['mbiemri'].'
										<td>'.$row['username'].'
										<td>'.$row['email'];

				
									$count++;
							}
						?>

					</TABLE>
				
			</div>
			
		</div>
		
	<br>
</body>
</html>
