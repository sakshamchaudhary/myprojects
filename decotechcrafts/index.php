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
	$j=1;
	$select = $con->query("select * from carousel_images");
	while($row = $select->fetch_assoc()) {
        $img_id[$j] = $row['img_id'];
		$img_name[$j] = $row['img_name'];
		$j++;
	};
	?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="admin/carousel_images/<?php echo $img_name[1]; ?>" width="460" height="345">
      </div>

      <div class="item">
        <img src="admin/carousel_images/<?php echo $img_name[2]; ?>" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="admin/carousel_images/<?php echo $img_name[3]; ?>" width="460" height="345">
      </div>

      <div class="item">
        <img src="admin/carousel_images/<?php echo $img_name[4]; ?>" width="460" height="345">
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><br>


	<?php
    	include("includes/connect.php");
		$select = $con->query("select * from posts order by rand() limit 0,9");
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