<?php
require "includes/connect.php";

	 $emri = $_POST['emri'];
     $mbiemri = $_POST['mbiemri'];
	 $username = $_POST['username'];
	 $email = $_POST['email'];
	 $pass = $_POST['psw'];
	 $kpass = $_POST['kpsw'];

     $abonimi = $_POST['abonimi'];
	 $roli = 2;
	 $date=date("Y-m-d");
	
	 //nese ekziston nje perdorues i tille countemail validon vlerat
	 $queryEmail = mysqli_query($conn, "SELECT email FROM perdoruesi WHERE email='$email'");
	 $countEmail = @mysqli_num_rows($queryEmail);

	 //nese ka qisi usernamei
	 $queryUsername = mysqli_query($conn, "SELECT username FROM perdoruesi WHERE username='$username'");
	 $countUsername = @mysqli_num_rows($queryUsername);


	 //variabla $register tregon nese mund te kryejme regjistrimin e studentit/ jo
//kur ka gabime $register e merr vleren false 
	 $register=true;
	 
	 $error=" ";
	 /*
$result = mysqli_query($conn,"SELECT * FROM abonimi WHERE lloji='" . $abonimi . "'");
$row= mysqli_fetch_array($result);
$abonimi_id=$row['id'];
	 $sql = "INSERT INTO `perdoruesi`( `emri`, `mbiemri`, `username`, `fjalkalimi`, `email`, `roli_id`) VALUES ('$emri','$mbiemri','$username','$pass','$email','$roli')";
     $sqlu="INSERT INTO `pagesa` (`abonimi_id`, `username`, `data`) VALUES ( '$abonimi_id', '$username', '$date')";
     $insert=mysqli_query($conn, $sql);
	 $insertt=mysqli_query($conn, $sqlu);
		if ($insert&&$insertt) {
echo "u regjistruat me sukses";
echo("<script>location.href='card.php?username=".$username."';</script>");

 } */
 //nese asnjera nga fushat e formes nuk eshte e plotesuar
if(empty($emri) && empty($mbiemri) && empty($username) && empty($email) && empty($pass) && empty($abonimi)&& empty($date)) {
	$errorGen = "Te gjitha fushat duhet te plotesohen!";
	$register = false;
}
//nese ndonjera permban vler mi validu
else {
	//fusha e emrit e zbrazet
	if(empty($emri)) {
		$errorFname = "Fusha e emrit duhet te plotesohet!";
		$register = false;
	}
	
	//emri ka vlere, validimi
	else {
		//nese emri permba karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $emri)) {
			$errorFname = "Emri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
	
	//fusha e mbiemritee zbrazet
	if(empty($mbiemri)) {
		$errorLname = "Fusha e mbiemrit duhet te plotesohet!";
		$register = false;
	}
	
	//mbiemri ka vlere, validimi
	else {
		// mbiemri permban  karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $mbiemri)) {
			$errorLname = "Mbiemri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
	
	
	//email adresa e zbrazet
	if(empty($email)) {
		$errorEmail = "Fusha e email adreses duhet te plotesohet!";
		$register = false;
	}
	
	//email adresa ka vlere validimi
	else {
		//nese formati i email adreses se shenuar nuk eshte i sakte
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errorEmail = "Formati i email adreses nuk eshte i sakte!";
			$register = false;
		}
		//nese ka perdorues qe e ka kete email adrese
		else if($countEmail != 0) {
			$errorEmail = "Ky email tashme ekziston!";
			$register = false;
		}
	}
		//fusha e id-se e zbrazet
		if(empty($abonimi)) {
			$errorID = "abnimi sosht";
			$register = false;
		}
	
	//fusha e id-se e zbrazet
	if(empty($username)) {
		$errorID = "Fusha e id-se duhet te plotesohet!";
		$register = false;
	}
		
	//id ka vlere, validimi
	else {
		//nese ekziston nje perdorues qe e ka kete id 
		if($countUsername != 0) {
			$errorID = "Ky perdorues tashme ekziston!";
			$register = false;
		}
	}

	// fusha e fjalekalimit eshte e zbrazet
	if(empty($pass)) {
		$errorPass = "Fusha e fjalekalimit duhet te plotesohet!";
		$register = false;
	}
	
	//fjalekalimi ka vlere, validimi
	else {
		$uppercase = preg_match("@[A-Z]@", $pass);
		$lowercase = preg_match("@[a-z]@", $pass);
		$number = preg_match("@[0-9]@", $pass);
		$specialChars = preg_match("@[^\w]@", $pass);

		//nese nuk plotesohet njeri nga kushtet konsiderohet qe fjalekalimi eshte i dobet
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
			$errorPass = "Fjalekalim i dobet";
			$errorPassTooltip = "Fjalekalimi duhet te permbaje 8 karaktere dhe te perfshije nje shkronje te madhe, nje numer dhe nje karakter special!";
			$register = false;
		}
		if ($pass!==$kpass){
			$errorPass="fjalekalimi nuk eshte i njejt";
		}
	}
//nese asnje gabim nuk ka ndodh 
if($register == true) {
		
	//inserto ne db
	
	$error=" ";
	$result = mysqli_query($conn,"SELECT * FROM abonimi WHERE lloji='" . $abonimi . "'");
	$row= mysqli_fetch_array($result);
	$abonimi_id=$row['id'];
		 $sql = "INSERT INTO `perdoruesi`( `emri`, `mbiemri`, `username`, `fjalkalimi`, `email`, `roli_id`) VALUES ('$emri','$mbiemri','$username',md5('$pass'),'$email','$roli')";
		 $sqlu="INSERT INTO `pagesa` (`abonimi_id`, `username`, `data`) VALUES ( '$abonimi_id', '$username', '$date')";
		 $insert=mysqli_query($conn, $sql);
		 $insertt=mysqli_query($conn, $sqlu);
			if ($insert&&$insertt) {
	echo "u regjistruat me sukses";
	echo("<script>location.href='card_info.php?username=".$username."';</script>");
	
	 } 	 else {
			echo $error . $sql . "
	" . mysqli_error($conn);
		 }
		 mysqli_close($conn);
		}

}
?>