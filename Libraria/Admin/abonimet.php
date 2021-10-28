<?php 
session_start();
require ('includes/connect.php');

	$q="select * from abonimi";
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

		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				<div class="tabela">
					<table style="width:100%" >
						<tr>
						<td colspan="9"><a class="btn" href="shto_abonime.php">Shto Abonime</a></td>
						</tr>
						<tr>
<td ><b><u>SR.NO</u></b></td>
<td ><b><u>Emri</u></b></td>
<td ><b><u>Fshij</u></b></td>
<td ><b><u>Ndrysho</u></b></td>


			

							
						</tr>
						<?php
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['lloji'];
										;
										
 echo '<td><a class="btn" href="process_del_abonime.php?id='.$row['id'].'">Fshij</a>';
							
     echo     '<td><a class ="btn" href="update_abonime.php?id='.$row['id'].'">Ndrysho</a>
								</tr>';
								
									$count++;
							}
						?>
					</TABLE>
				</div>
			</div>
			
		</div>
		
	</div>
	
	<div style="clear: both;">&nbsp;</div>
</div>
</div>

</body>
</html>
