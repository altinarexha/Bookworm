<?php session_start();
require('includes/connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<link href= 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'> 
      
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" > 
    </script> 
      
  <script src= "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" > </script>
	<script src="js/jquery.js">	</script>
  
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
<!-- end header -->
<!-- start page -->

<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post" style="margin-left:100px">
			<div class="entry" >
			<div class="forma1">
			<center>
						<h3 class="title" >Shto Libra</h3>
						</center>

				<form action='process_addbook.php' method='POST' enctype="multipart/form-data">
				
				        <br><b>Id e Librit:</b><br>
						<input type='text' name='id' size='40'>
						<br><br>
						<br><b>Emri i Librit:</b><br>
						<input type='text' name='name' size='40'>
						<br><br>
						
						
						<br><br>
						
						<b>Pershkrimi:</b><br>
						<textarea cols="40" rows="6" name='description' ></textarea>
						<br><br>
						
						<b>Autori: </b><br>
						<input type='text' name='publisher' size='40'>
						<br><br>
						
						
						<b>Nr i faqeve:</b><br>
						<input type='number' name='pages' size='40'>
						<br><br>
						
						<b>Viti:</b><br>
						<input type='text' id="datepicker" name='year' size='40'>
						<br><br>
						<div class="divv">
						<b>Image:</b><br>

						<input type='file' name='img' size='35'>
						<br><br>
						</div>
						<div class="divv">
						<b>E-Book:</b><br>
						<input type='file' name='ebook'  size='35'>
						<br><br>
						</div>
						<br><br>
						<center>
						<input class="btn" type='submit' name='shto' value='   Shto  '  >
						<br>
						<br>
				</form>
			</div>
			
		</div>
		</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
			<?php
			//	include("includes/footer.inc.php");
			?>
</div>
<!-- end footer -->
</body>
</html>
