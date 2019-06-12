<!DOCTYPE html>
<html>
    <?php include('headerfiles.php'); ?>
<body>

	<?php include('navbar.php'); ?>
	
	<div class="container">
	<?php
	    $page_id = $_GET['id'];
		include("includes/connect.php");
		$select1 = $con->query("select * from posts where post_id = '$page_id';");
        $row = $select1->fetch_assoc();
		?>

		<h1><?php echo $row['post_title'];?></h1>
        <p align='right'><b>Published on: <?php echo $row['post_date'];?></b></p>
	    
		<center><img class="img img-responsive" src="admin/uploads/<?php echo $row['post_image'];?>" width='850'></center><br>
		<p><?php echo $row['post_content'];?></p>
			
	</div>
	<?php include"footer.php";?>
</body>
	
</html>