<?php
session_start();
if(!isset($_SESSION['user_name'])) {
    header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html>
    <?php 
	    include('headerfiles.php'); 
	?>
<body>

	<?php 
	    include('navbar.php');
        include("includes/connect.php");
	?>
	<div class="container" style="margin-top:50px;">
	<?php if(isset($_GET['edited'])) echo"<center><h4>Post Edited!!</h4></center>";?>
	<?php if(isset($_GET['err'])) echo"<center><h4>Error occured!!</h4></center>";?>
	<table class="table table-bordered">
	    <tr>
		    <td align="center" colspan="9" bgcolor="orange"><h1>Edit All Posts</h1></td>
		</tr>
		<tr>
		    <th>Post No.</th>
			<th>Post Title</th>
			<th>Post Date</th>
			<th>category</th>
			<th>Post Image</th>
			<th>Post content</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		$select2 = $con->query("select * from posts order by 1 desc;");
		$i=1;
		if($select2->num_rows>0)
			while($row = $select2->fetch_assoc()) {
				?>
				<tr align="center">
				    <td><?php echo $i;$i++; ?>.</td>
					<td><?php echo $row['post_title']; ?></td>
					<td><?php echo $row['post_date']; ?></td>
					
					
					<?php
					$category_id=$row['category_id'];
					$select3 = $con->query("select * from categories where category_id='$category_id'");
			        $row3 = $select3->fetch_assoc()
				   ?>
					<td><?php echo $row3['category_name']; ?></td>
			     
				   
					<td><img src="uploads/<?php echo $row['post_image']; ?>" width="100px;"></td>
					<td><?php echo substr($row['post_content'],0,100); ?>...</td>
					<td><a href="edit.php?edit=<?php echo $row['post_id'];?>">Edit</a></td>
					<td><a href="delete.php?del=<?php echo $row['post_id'];?>">Delete</a></td>
				</tr>
				<?php
			}
    ?>
    </table>
    </div>
</body>
</html>
<?php } ?>