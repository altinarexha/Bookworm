<?php 
session_start();
require('includes/connect.php');

	$q="SELECT p.id ,p.username,a.lloji,p.data
from pagesa p , abonimi a 
where p.abonimi_id=a.id" ;
	//$q1="select username from perdoruesi where id in (select user_id from kerkesa where id=$count)";
	 $res=mysqli_query($conn,$q) or die("Can't Execute Query...");

//nese perdoruesi eshte kyq
if(isset($_SESSION['username']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte administrator, atehere paraqitja kete pamje te kesaj web faqeje
	if($_SESSION['roli'] == 1) {
?>

<!DOCTYPE html >

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="Style/style.css">
<script src="js/all.js"></script>
	
</head>
<body>
<!-- start header -->
<div id="header">

	<?php
		include("includes/template/admin_header.php");
		?>

</div>

	<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				
					<table  WIDTH='100%'>
						<tr>
								<td WIDTH='10%' ><b><u>SR.NO</u></b>
								<TD ><b><u>Username</u></b>
								<TD ><b><u>Abonimi</u></b>
								<TD ><b><u>Data fillimit</u></b>
								<TD ><b><u>Data mbarimit</u></b>
								<TD ><b><u>Statusi</u></b>

						</tr>
						<?php
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
								$data_fillimit=$row['data'];
								
							  if ($row['lloji']=='Pro'){
								$data_mbarimit = date('Y-m-d', strtotime("+6 months", strtotime($data_fillimit)));
								}
								else if ($row['lloji']=='Premium'){
									$data_mbarimit = date('Y-m-d', strtotime("+12 months", strtotime($data_fillimit)));
									}
									else if ($row['lloji']=='Basic'){
										$data_mbarimit = date('Y-m-d', strtotime("+1 months", strtotime($data_fillimit)));
										}
								
						   $now = new DateTime();
						   $data_mbarim= new DateTime($data_mbarimit);
						   $statusi='';
                           if($now > $data_mbarim) {
											$statusi='Pasiv';
											
										}
							 else{
								$statusi='Aktiv';
							 }
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['username'].'
										<td>'.$row['lloji'].'
										<td>'.$row['data'].'
										<td>'.$data_mbarimit.'
										<td>'.$statusi;'
									
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
	} 	//nese perdoruesi nuk eshte administrator ridrejtoje ne faqen baze pas kyqjes
	else {
		header("Location: home.php");
	}
}
//nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
else {
	header("Location: login.php");
}
?>