<?php
session_start();
require '../includes/connect.php';
// kontrollo nese perdoruesi eshte loguar
if(isset($_SESSION['username']) && !empty($_SESSION['username'])){

$username = $_SESSION['username'];
$get_user_data = mysqli_query($conn, "SELECT * FROM `perdoruesi` WHERE username = '$username'");
$userData =  mysqli_fetch_assoc($get_user_data);

}else{
header('Location: logout.php');
exit;
}
?>

<!DOCTYPE html>
<head>
    <title>Bookworm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../Style/style.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>
	

	</head>

	<body class=admin-data>
			<?php include "../includes/template/admin_header.php";?>
			
			<section class="main-text" >
      <br>
      <div style='color:#2F4F4F;'>
      <i class="fa fa-cogs fa-4x" aria-hidden="true"></i>

        <h2> Pershendetje Admin: <?php echo $userData['emri'];?></h2>
        </div>
<br>

	<div class="row">
  <div class="a_column"  style="background:#75be7a ;color:#a9d6ac"">
  <i class="fa fa-user fa-3x" aria-hidden="true"style="color:#a9d6ac"></i>
  <?php
$query = "SELECT id FROM perdoruesi WHERE roli_id='2'"; 
      
    // Execute the query and store the result set 
    $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf("  :  " . $row); 
              } 
        // close the result. 
        mysqli_free_result($result); 
    }?> </div>
	
	
	
  <div class="a_column"  style="background:#75b9be;color:#a9d3d6;">
  <i class="fa fa-book fa-3x" aria-hidden="true" style="color:#a9d3d6;"></i>

     <?php
$query = "SELECT id FROM librat"; 
      
    // Execute the query and store the result set 
    $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf("  :  " . $row); 
              } 
        // close the result. 
        mysqli_free_result($result); 
    }?> 
	
  </div>
  
  <div class="a_column"  style="background:#be7a75;color:#d6aca9;">
  <i class="fa fa-envelope-open-o fa-3x" aria-hidden="true" style="color:#d6aca9;"></i>

     <?php
$query = "SELECT id FROM kerkesa"; 
      
    // Execute the query and store the result set 
    $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf("  :  " . $row); 
              } 
        // close the result. 
        mysqli_free_result($result); 
    }?> 
  </div>
</div>
</section>
<br>
</body>
</html>
		