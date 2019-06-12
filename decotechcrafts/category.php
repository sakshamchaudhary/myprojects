<!DOCTYPE html>
<html>
    <?php include('headerfiles.php'); ?>
<body>

	<?php include('navbar.php'); ?>
	
	<div class="container">
	<div class="row">
	<div class="col-sm-3" >
	    <div class="list-group">
            <a href="#" class="list-group-item disabled">Categories List</a>
			<?php
    	        include("includes/connect.php");
		        $select1 = $con->query("select * from categories order by 1 DESC");
		        if($select1->num_rows>0)
		        	while($row1 = $select1->fetch_assoc()) {
				    $category_name = $row1['category_name'];
					$category_id = $row1['category_id'];
				?>
                <a href="category.php?id=<?php echo $category_id;?>" class="list-group-item" id='category-item'><?php echo $category_name; ?></a>
			   <?php }; ?>
       </div>
    </div>
	<div class="col-sm-9">
	<?php
    	include("includes/connect.php");
		$category_id=$_GET['id'];
		$select = $con->query("select * from posts WHERE category_id='$category_id' order by 1 DESC");
		if($select->num_rows>0)
			while($row = $select->fetch_assoc()) {
				$content = substr($row['post_content'],0,50);
				?>
				<div class="col-md-4">
				<div id="box">
				<h4><?php echo $row['post_title'];?></h4>
				<i>Published on: <?php echo $row['post_date'];?></i>
				
				<center><img src="admin/uploads/<?php echo $row['post_image'];?>" id="box_img"></center>
				<p><?php echo $content."....";?><a href="readmore.php?id=<?php echo $row['post_id'];?>">Read More</a></p>
				</div>
				</div>
				<?php
		    };
	?>
	</div>
	</div>
	</div>
	<?php include"footer.php";?>
</body>
</html>