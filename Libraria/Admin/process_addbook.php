<?php
require('includes/connect.php');

	if(!empty($_POST))
	{   $b_id=$_POST['id'];
		$b_nm=$_POST['name'];
			$b_desc=$_POST['description'];
			$b_publisher=$_POST['publisher'];			
			$b_pages=$_POST['pages'];
			$b_year=$_POST['year'];
			
		
		$msg=array();
		if(empty($_POST['name']) || empty($_POST['id']) || empty($_POST['description']) || empty($_POST['publisher']) || empty($_POST['pages']) || empty($_POST['year']))
		{
			$msg[]="Please full fill all requirement";
		}
		
		if(empty($_FILES['img']['name']))
		$msg[] = "Please provide a file";
	
		if($_FILES['img']['error']>0)
		$msg[] = "Error uploading file";
		
				
		if(!(strtoupper(substr($_FILES['img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['img']['name'],-5))==".JPEG"|| strtoupper(substr($_FILES['img']['name'],-4))==".GIF"))
			$msg[] = "wrong file  type";
			
		
		
		if(empty($_FILES['ebook']['name']))
		$msg[] = "Please provide a document file";
	
		if($_FILES['ebook']['error']>0)
		$msg[] = "Error uploading document file";
		
		
		if(!(strtoupper(substr($_FILES['ebook']['name'],-4))==".PDF" || strtoupper(substr($_FILES['ebook']['name'],-4))==".PPT" ||strtoupper(substr($_FILES['ebook']['name'],-5))==".PPTX" ||  strtoupper(substr($_FILES['ebook']['name'],-4))==".DOC"|| strtoupper(substr($_FILES['ebook']['name'],-4))==".TXT"|| strtoupper(substr($_FILES['ebook']['name'],-5))==".DOCX"))
			$msg[] = "wrong document file  type";
			
		
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			$b_img = "images/".$_FILES['img']['name'];	
			
			$b_pdf = "Librat/".$_FILES['ebook']['name'];	
		    
			$b_id=$_POST['id'];

			$b_nm=$_POST['name'];
			$b_desc=$_POST['description'];
			$b_publisher=$_POST['publisher'];			
			$b_pages=$_POST['pages'];
			$b_year=$_POST['year'];
			
		
			
			$query="INSERT INTO `librat`(`id`, `emri`, `emri_autorit`, `Nr_faqeve`, `viti`, `pershkrimi`, `foto`, `pdf`)
			VALUES('$b_id','$b_nm','$b_publisher',$b_pages,STR_TO_DATE('$b_year', '%m/%d/%Y'),'$b_desc','$b_img','$b_pdf')";
						mysqli_query($conn,$query) or die($query."Can't Connect to Query...");

           // if(isset($_POST['shto'])){//to run PHP script on submit
				 
				//}
			//$query2='insert into kategorite'
echo("<script>location.href='kat.php?id=".$b_id."';</script>");

		
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	