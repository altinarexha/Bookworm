<?php 
session_start();
require('includes/connect.php');

	$q="select k.id,k.subjekti,k.pershkrimi,p.username, p.email from kerkesa k, perdoruesi p where p.id=k.user_id";
	//$q1="select username from perdoruesi where id in (select user_id from kerkesa where id=$count)";
	 $res=mysqli_query($conn,$q) or die("Can't Execute Query...");

//nese perdoruesi eshte kyq
if(isset($_SESSION['username']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte administrator, atehere paraqitja kete pamje te kesaj web faqeje
	if($_SESSION['roli'] == 1) {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="Style/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

	<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				
					<table WIDTH='100%'>
						<tr><td WIDTH='10%' ><b><u>SR.NO</u></b>
								<TD ><b><u>Username</u></b>
								<TD ><b><u>Subjekti</u></b>
								<TD ><b><u>Pershkrimi</u></b>
								<TD ><b><u>Fshij</u></b>
						</tr>
						<?php
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
								$email=$row['email'];
								$subject='Kerkesa eshte plotesuar';
								$message='ju njoftoj qe kemi plotsu kerkesen';
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['username'].'
										<td>'.$row['subjekti'].'
										<td>'.$row['pershkrimi'].'
										<td><a class ="btn" href="process_del_contact.php?id='.$row['id'].'">Fshije</a>
												
									
									</tr>';
									$count++;
							}
						?>

					</TABLE>
				
			</div>
			
		</div>
		

</body>
</html>
<?php
	}
	//nese perdoruesi nuk eshte administrator ridrejtoje ne faqen baze pas kyqjes
	else {
		header("Location: home.php");
	}
}
//nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
else {
	header("Location: login.php");
}
?>