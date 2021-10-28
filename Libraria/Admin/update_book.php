
<?php
session_start();
include_once 'includes/connect.php';
if(count($_POST)>0) {
	
			//move_uploaded_file($_FILES['img']['tmp_name'],"Libraria/images/".$_FILES['img']['name']);
			$b_img = "images/".$_FILES['img']['name'];	
			
			//move_uploaded_file($_FILES['ebook']['tmp_name'],"Libraria/Librat/".$_FILES['ebook']['name']);
			$b_pdf = "Librat/".$_FILES['ebook']['name'];	
		
			$year=$_POST['year'];
			$yr="STR_TO_DATE('$year', '%m/%d/%Y')";
			$sql="UPDATE librat set id='" . $_POST['id'] . "', emri='" . $_POST['name'] ."', emri_autorit='" . $_POST['publisher'] ."',
 Nr_faqeve='" . $_POST['pages'] . "', viti='" . $year ."', pershkrimi='" . $_POST['description'] . "', foto='" . $b_img . "', pdf='" . $b_pdf . "' WHERE id='" . $_POST['id'] . "'";
			$query="delete from libri_ka_kategori where libri_id=".$_GET['id'];


$update=mysqli_query($conn,$sql);
$update1=mysqli_query($conn,$query);
if($update&&$update1){
$message = "Record Modified Successfully";
echo("<script>location.href='kat.php?id=".$_GET['id']."';</script>");
}

}
$result = mysqli_query($conn,"SELECT * FROM librat WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);


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
	<script>
		$( function() {
  $( "#datepicker" ).datepicker()
});
		</script>
<link rel="stylesheet" type="text/css" href="Style/style.css">
<style>
	



</style>
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
						<h3 class="title" >Ndrysho Libra</h3>
						</center>

				<form action='' method='POST' enctype="multipart/form-data">
<div><?php if(isset($message)) { echo $message; } ?>

<input type="hidden" name="id" class="txtField"  value="<?php echo $row['id']; ?>">
<br>
<b>Id:</b><br>

<input type="text" name="id"  value="<?php echo $row['id']; ?>">
<br>				
						<br><b>Emri i Librit:</b><br>
						<input type='text' name='name' value="<?php echo $row['emri']; ?>" size='40'>
						<br><br>

								
						</select>
						
						<br><br>
						
						<b>Pershkrimi:</b><br>
						<textarea cols="40" rows="6" name='description' value="<?php echo $row['pershkrimi']; ?>" ></textarea>
						<br><br>
						
						<b>Autori: </b><br>
						<input type='text' name='publisher' size='40' value="<?php echo $row['emri_autorit']; ?>">
						<br><br>
						
						
						<b>Nr i faqeve:</b><br>
						<input type='number' name='pages' size='40' value="<?php echo $row['Nr_faqeve']; ?>">
						<br><br>
						
						<b>Viti:</b><br>
						<input type='text' name='year' id="datepicker" size='40' value="<?php echo $row['viti']; ?>">
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
						<input class="btn" type='submit'  value='   Ndrysho  '  >
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
