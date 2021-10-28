<?php



if(isset($_POST['username']) && isset($_POST['psw'])){

// kontrollon nese fushat jane te paplotsuara
if(!empty(trim($_POST['username'])) && !empty(trim($_POST['psw']))){

$username = $_POST['username'];
$q=" select a.lloji,p.data 
from pagesa p , abonimi a 
where p.abonimi_id=a.id and p.username='".$username."'";
 $res=mysqli_query($conn,$q) or die($conn);

$query = mysqli_query($conn, "SELECT * FROM `perdoruesi` WHERE username = '$username'");

if(mysqli_num_rows($query) > 0){

$row = mysqli_fetch_assoc($query);
$roli=$row['roli_id'];
$_SESSION['roli'] = $roli;

$user_db_pass = $row['fjalkalimi'];


if(md5($_POST['psw'])===$user_db_pass){

session_regenerate_id(true);

if($_SESSION[roli]==2) {
	$_SESSION['username'] = $username; 
	
	
	 while($ro=mysqli_fetch_assoc($res))
							{
								$data_fillimit=$ro['data'];
								$statusi=true;
							  if ($ro['lloji']=='Pro'){
								$data_mbarimit = date('Y-m-d', strtotime("+6 months", strtotime($data_fillimit)));

								}
								else if ($ro['lloji']=='Premium'){
									$data_mbarimit = date('Y-m-d', strtotime("+12 months", strtotime($data_fillimit)));

									}
									else if ($ro['lloji']=='Basic'){
										$data_mbarimit = date('Y-m-d', strtotime("+1 months", strtotime($data_fillimit)));

										}
								
						   $now = new DateTime();
						   $data_mbarim= new DateTime($data_mbarimit);
                           if($now > $data_mbarim) {
											$statusi=false;
											
										}
										
							}
	$s=$statusi;
	$_SESSION['statusi']=$s;
	
		header('Location: home.php');
exit;
}
if($_SESSION[roli]==1) {
	$_SESSION['username'] = $username; 

header('Location: Admin/adminhome.php');
exit;}

}
else{
// INCORRECT PASSWORD
$error_message = "Keni shtypur gabim fjalkalimin.";

}

}
else{
// EMAIL NOT REGISTERED
$error_message = "Nuk ekziston nje perdorues me kete username.";
}

}
else{

// IF FIELDS ARE EMPTY
$error_message = "Please fill in all the required fields.";
}

}
?>
