
<?php
session_start();
include_once 'includes/connect.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE kategori set id='" . $_POST['id'] . "', emri='" . $_POST['emri'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
			header("location:kategorite.php");

}
$result = mysqli_query($conn,"SELECT * FROM kategori WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?><?php
		include("includes/template/admin_header.php");
		?>


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="Style/style.css">

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

		
<head>

		
		
<style>
	.mynav li img{
    height:4.5%;
  }


</style>
<body>
<!-- start header -->
<div id="header">
	<div id="menu">
		<?php
			//include("includes/menu.inc.php");
		?>
	</div>
</div>
<div id="logo-wrap">
<div id="logo">
		<?php
			//include("includes/logo.inc.php");
		?>
</div>
</div>
<!-- end header -->
<!-- start page -->
<title>Update kategori</title>
</head>
<body>
<div class="forma">
<div class="hija">
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
<center>
<h3>Ndrysho Kategorite</h3>
</center>
</div>
<div style="padding-bottom:5px;">
</div>
<input type="hidden" name="id" class="txtField"  value="<?php echo $row['id']; ?>">
<br>
<b>Id:</b><br>

<input type="text" name="id"  value="<?php echo $row['id']; ?>">
<br>
<b>Emri:</b><br>

<input type="text" name="emri" class="txtField" value="<?php echo $row['emri']; ?>">
<br>
<center>
<input class="btn"type="submit" name="submit" value="Submit" class="buttom">

</form>
</div>
</div class>
</body>
</html>