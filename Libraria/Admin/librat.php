<?php 
session_start();
require ('includes/connect.php');

	$q="select * from librat";
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
						<td colspan="3"><a class="btn" href="shto_libra.php">Shto Nje Liber Te Ri</a></td>
						<td colspan="3"><a class="btn" href="libri_ka_kategori.php">Kategorite e Librave</a></td>

						</tr>
						<tr>
<td ><b><u>SR.NO</u></b></td>
<TD ><b><u>Emri</u></b></TD>
<TD ><b><u>Autori</u></b></TD>
<TD ><b><u>Nr.faqeve</u></b></TD>
<TD ><b><u>Viti</u></b></TD>
<TD ><b><u>Pershkrimi</u></b></TD>
<TD ><b><u>Foto</u></b></TD>	
<TD ><b><u>Pdf</u></b></TD>	
<TD ><b><u>Del</u></b></TD>
<TD ><b><u>Ndrysho</u></b></TD>				
				

							
						</tr>
						<?php
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['emri'].'
										<td>'.$row['emri_autorit'].'
										<td>'.$row['Nr_faqeve'].'
										<td>'.$row['viti'].'
										<td>'.$row['pershkrimi'];

				echo "<td><img src='$row[foto]' width='100'/>";
				echo "<td><a class=btn  href='$row[pdf]' target='_blank'>PDF</a>";

			     echo '<td><a class="btn" href="process_del_book.php?id='.$row['id'].'">Fshij</a>';
							
     echo     '<td><a class="btn" href="update_book.php?id='.$row['id'].'">Ndrysho</a>
								</tr>';
									$count++;
							}
						?>

					</TABLE>
				
			</div>
			
		</div>
	
</body>
</html>
