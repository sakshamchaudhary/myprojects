<?php
session_start();
if(!isset($_SESSION['user_name'])) {
    header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html>
    <?php include('headerfiles.php'); ?>
<body>

	<?php include('navbar.php'); ?>
	
	<div class="container" style="margin-top:50px;">
	<?php if (isset($_GET['done'])) echo"<center><h4>Category added!</h4></center>";?>
    
	<form action="add_categoryback.php" role="form"
     method="post">
    <div class="form-group">
      <label for="categ">Add Category:</label>
      <input type="text" class="form-control" id="categ" name="category" placeholder="Enter Category"/>
    </div>
    </form>
	<br>
	<?php if (isset($_GET['err'])) echo"<center><h4 style='color:red;'>Category contains childs, first delete them!</h4></center>";?>
	
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
                <div class="list-group-item" id="category-item"><?php echo $category_name; ?>
				<a href="delete_category.php?del=<?php echo $category_id;?>" style="float:right;">Delete</a>
				</div>
			   <?php }; ?>
       </div>
    </div>
	</div>
	</div>
</body>
</html>
<?php }; ?>