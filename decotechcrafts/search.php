<!DOCTYPE html>
<html>
    <?php include('headerfiles.php'); ?>
<body>

	<?php include('navbar.php'); ?>
	
		<div class="container">
	<?php
	    include('includes/connect.php');
		if (isset($_GET['search'])) {
			$search_title = $_GET['search'];
			$search_query = $con->query("select * from posts where post_title like '%$search_title%'");
			$flag = 0;
			while($row = $search_query->fetch_assoc()) {
				$flag = 1;
			?>
			<h2><?php echo $row['post_title'];?></h2>
	    	<img src="admin/uploads/<?php echo $row['post_image'];?>" width='250px'>
		    <p><?php echo substr($row['post_content'],0,100)."..... ";?>
			<a href="readmore.php?id=<?php echo $row['post_id'];?>" font-size="20px">Read More</a></p>
			<?php
			}
			if($flag == 0){
				?><div style="height:450px;"><center><h3>No matches found!</h3></center></div><?php
			}
		}
	?>
	</div>
	<?php include"footer.php";?>
</body>
</html>