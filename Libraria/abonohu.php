<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script src="js/jquery.js"></script>
<?php
session_start();
require 'includes/connect.php';
 include "includes/template/admin_header.php";

// kontrollo nese perdoruesi eshte loguar
if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
$username = $_SESSION['username'];
			 $sql=mysqli_query($conn,"SELECT * FROM perdoruesi WHERE username='".$username."'");
$row= mysqli_fetch_array($sql);	}
		 else{header('Location: logout.php');
exit;}
?>

<style>


</style>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
<title>Quick Register Form Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="Style/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="login-body">
<div class="signupform">
	<div class="lgcontainer">
		
		<div class="agile_info">
		<br>
		<br>
			<div class="w3_info_a">
			<center>
				<h2 >Abonohuni ketu!</h2>
				</center>
				
				<br>
				<form action="#" method="post">

				<input type="radio" name="abonimi" value="Basic">
						<label class="container-price">Basic: 7.00€ / muaj
            <span class="checkmark"></span>
            </label>
			<input type="radio" name="abonimi" value="Pro">
           <label class="container-price">Pro: 33.00€ / 6 muaj

           <span class="checkmark"></span>
           </label>
           <input type="radio" name="abonimi" value="Premium"> 
           <label class="container-price">Premium: 55.00€ / vit
           <span class="checkmark"></span>
		   </label>
				<br><br>
				
				
				
						<div class="left margin">
							<label>Card Holder</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="cardholder" placeholder="Card Holder" required=""> 
							</div>
						</div>
						<div class="left">
							<label>Card Number</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="cardnumber" data-mask="0000 0000 0000 0000" placeholder="Card Number" required=""> 
							</div>
						</div>
						<div class="left margin">
							<label>Expiry Date </label>
							<div class="input-group">
								<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
								<input type="text" name="expiry-data" placeholder="MM/YY" required=""> 
							</div>
						</div>
						<div class="left">
							<label>CVC</label>
							<div class="input-group">
								<span><i class="fa fa-phone" aria-hidden="true"></i></span>
								<input type="text" name="cvc" placeholder="CVCS" data-mask="000" required="">
							</div>
						</div>
           <button class="btn btn-danger btn-block" type="submit" style="margin-left:170px;"name="reg1">Abonohu </button>  
<br>
<br>		   
					</form>
			</div>
			<br><br>
			
			</div>
		</div>
		<?php
		if(isset($_POST['reg1'])){

     $abonimi = $_POST['abonimi'];
	 $date=date("Y-m-d");
	 $result = mysqli_query($conn,"SELECT * FROM abonimi WHERE lloji='" . $abonimi . "'");
	$row= mysqli_fetch_array($result);
	$abonimi_id=$row['id'];

			 $sqlu="update pagesa set abonimi_id ='".$abonimi_id."' ,  username='".$username."' , data ='".$date."' where username='".$username."'";
		     $insertt=mysqli_query($conn, $sqlu);
if($insertt){		
echo "u abonuat";
session_destroy();
	echo("<script>location.href='login.php';</script>");


	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

	
		
		?>
	</div>

	</body>
	<footer>
	<?php include "includes/template/footer.php";?>
	</footer>
</html>