<?php
require('includes/connect.php');
//include('includes/template/header.php');
 session_start();	
	$cat=$_GET['id'];
	
	$books_by_categori="select l.emri, l.foto from librat l, libri_ka_kategori kat, 
	kategori k where l.id=kat.libri_id and k.id=kat.kategori_id and k.emri='aksion'";
   $total="select count(*) \"total\" from librat where id in 
                                 (select libri_id from libri_ka_kategori where kategori_id='$cat')";
	$totalq="select count(*) \"total\" from librat where b_subcat='$cat'";
	
	$totalres=mysqli_query($conn,$total) or die("Can't Execute Query1...");
	$totalrow=mysqli_fetch_assoc($totalres);
	
	$page_per_page=8;
	
	$page_total_rec=$totalrow['total'];
	
	$page_total_page=ceil($page_total_rec/$page_per_page);
	
	
	if(!isset($_GET['page']))
	{
		$page_current_page=1;
	}
	else
	{
		$page_current_page=$_GET['page'];
	}
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="Style/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php include "includes/template/admin_header.php"; ?>
			
							<div id="content">
								<div class="post">
								<h2 class="main-text" style="color:#124559;"><?php echo $_GET['emri'];?></h2>
									<div class="entry">
									<table >
											<br><br><br><br><br>
											<?php
												
												$k=($page_current_page-1)*$page_per_page;
											
												$query="select * from librat where id in 
												(select libri_id from libri_ka_kategori where kategori_id='$cat') LIMIT ".$k .",".$page_per_page;
	
												$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
	
												$count=0;
												while($row1=mysqli_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}	
													echo '<td style="padding-left:50px;padding-right:50px;"> <div class="column">
													         <div class="hvr-grow-shadow">
														<a href="libri.php?id='.$row1['id'].'" style="text-decoration:none; color:black;">
														<img src="'.$row1['foto'].'" class="booksimg">
														<br><h5 style="text-align:center">'.$row1['emri'].'<br>'.$row1['emri_autorit'].'</h5></a>
													</td></div> </div>';
													$count++;							
													
												
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
											?>
									</table>
										
										
										<br><br><br>
										<div style='text-align:center; color:black;'>
										<?php
											
											if($page_total_page>$page_current_page)
											{
												echo '<a href="booklist.php?id='.$_GET['id'].'&emri='.$_GET['emri'].'&page='.($page_current_page+1).'" style="color:black;">Next</a>';
											}
											
											for($i=1;$i<=$page_total_page;$i++)
											{
												echo '&nbsp;&nbsp;<a style="color:black;"href="booklist.php?id='.$_GET['id'].'&emri='.$_GET['emri'].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
											}
											
											if($page_current_page>1)
											{	
												echo '<a href="booklist.php?id='.$_GET['id'].'&emri='.$_GET['emri'].'&page='.($page_current_page-1).'" style="color:black;">Previous</a>';
											}
											
										?>
										</div>
									

									</div>
									
								</div>
								
							</div>
				
			
				
			<footer>
	<?php include "includes/template/footer.php";?>
	</footer>
</body>
</html>
