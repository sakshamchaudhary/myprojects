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
    <form action="insertback.php"
     method="post" enctype="multipart/form-data">
	    <?php if (isset($_GET['done'])) echo"<center><h4>Post Uploaded!</h4></center>";?>
		<?php if (isset($_GET['err'])) echo"<center><h4>Error in uploading!</h4></center>";?>
        <table align="center" class="table table-bordered">
            <tr>
	            <td align="center" colspan="5" bgcolor="orange">
		        <h1>Insert New Post</h1></td>
	        </tr>
			<tr>
	            <td align="right">Post Category:</td>
		        <td>
				    <select class="form-control"name="category">
					<?php
    	        include("includes/connect.php");
		        $select1 = $con->query("select * from categories order by 1 DESC");
		        if($select1->num_rows>0)
		        	while($row1 = $select1->fetch_assoc()) {
				    $category_name = $row1['category_name'];
					$category_id = $row1['category_id'];
					?>
                        <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
					<?php } ?>  
                    </select>
				</td>
	        </tr>
            <tr>
	            <td align="right">Post Title:</td>
		        <td><input  class="form-control" required type="text" name="title" size="40"></td>
	        </tr>

	        <tr>
	            <td align="right">Post Image:</td>
		        <td><input required type="file" name="fileToUpload"></td>
	        </tr>
            <tr>
	            <td align="right">Post Content:</td>
		        <td><textarea required class="form-control" name="content" cols="20" rows="10"></textarea></td>
	        </tr>
            <tr>
	            <td align="center" colspan="5">
				    <input type="submit" class="btn btn-warning"
		            name="submit" value="Publish Now">
				</td>
	        </tr>
        </table>
    </form>
	</div>
</body>
</html>
<?php } ?>