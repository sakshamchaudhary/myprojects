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
<?php
	include("includes/connect.php");
	$edit_id = @$_GET['edit'];
	$select3 = $con->query("select * from posts where post_id='$edit_id'");
	$row=$select3->fetch_assoc();
		$edit_id1 = $row['post_id'];
		$title = $row['post_title'];
		$date = $row['post_date'];
		$image = $row['post_image'];
		$content = $row['post_content'];
?>
<form method="post" action="edit.php?edit_form=<?php echo
$edit_id1;?>&&img=<?php echo $image;?>" enctype="multipart/form-data">
<table  align="center" class="table table-bordered">
    <tr>
	    <td align="center" colspan="5" bgcolor="orange">
	    <h1>Editing Post</h1>
	</tr>
	
	<tr>
	    <td align="right">Post Title:</td>
		<td><input required type="text" name="title" size="40" value=
		"<?php echo $title; ?>"></td>
		
	</tr>
	<tr>
	    <td align="right">Post Image:</td>
		<td><input style="float:left" required type="file" name="fileToUpload">
		<img src="uploads/<?php echo $image;?>" width="70">
		</td>
	</tr>
	
    <tr>
	    <td align="right">Post Content:</td>
		<td><textarea required class="form-control" name="content" cols="40" rows="20">
		<?php echo $content; ?></textarea></td>
	</tr>
    <tr>
        <td align="center" colspan="5"><input type="submit"class="btn btn-warning"
        name="update" value="Update Now"></td>
    </tr>
</table>
</form>
</div>
<?php
    include('includes/connect.php');
    if(isset($_POST['update'])) {
		
		$filename= basename($_FILES["fileToUpload"]["name"]);
		$path="uploads/";
	    require"upload_img.php";
		if ($uploadOk == 0) {
		    
		}
		else {
	
	    $edit_id2 = $_GET['edit_form'];	
		$oldimg = $_GET['img'];
		$title2 = $_POST['title'];
		$date2 = date('y/m/d');
		$content2 = $_POST['content'];
		$image2= $randomname;
		
	    $editing = $con->query("UPDATE posts SET
		post_content='$content2',post_date='$date2',post_image='$image2',
		post_title='$title2' WHERE post_id='$edit_id2'");
		
		$imagepath = "Uploads/".$oldimg;
        unlink($imagepath);
		header('location:index.php?edited=true');
		
	    };
    };

?>
</body>
</html>
<?php } ?>