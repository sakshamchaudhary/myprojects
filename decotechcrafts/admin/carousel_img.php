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
	$j=1;
	$select = $con->query("select * from carousel_images");
	while($row = $select->fetch_assoc()) {
        $img_id[$j] = $row['img_id'];
		$img_name[$j] = $row['img_name'];
		$j++;
	};
	?>
	<?php if(isset($_GET['edited'])) echo"<center><h4>Image Edited!!</h4></center>";?>
	
        <table  align="center" class="table table-bordered">
            <tr>
	            <td align="center" colspan="2" bgcolor="orange">
	            <h1>Carousel Images</h1>
	        </tr>
			<tr>
	            <td align="right">1:</td>
		        <td>
				<form method="post" action="carousel_img.php?img_id=1&&img=<?php echo $img_name[1]; ?>" enctype="multipart/form-data">
                    <input style="float:left" required type="file" name="fileToUpload"/>
		            <img src="carousel_images/<?php echo $img_name[1];?>" width="70">
					
					<input style="float:right" type="submit"class="btn btn-warning"
                    name="update" value="Update Now">
				</form>
		        </td>
			</tr>
			<tr>
				<td align="right">2:</td>
		        <td>
				<form method="post" action="carousel_img.php?img_id=2&&img=<?php echo $img_name[2]; ?>" enctype="multipart/form-data">
                    <input style="float:left" required type="file" name="fileToUpload"/>
		            <img src="carousel_images/<?php echo $img_name[2];?>" width="70">
					
					<input style="float:right" type="submit"class="btn btn-warning"
                    name="update" value="Update Now">
				</form>
		        </td>
			</tr>
			<tr>
				<td align="right">3:</td>
		        <td>
				<form method="post" action="carousel_img.php?img_id=3&&img=<?php echo $img_name[3]; ?>" enctype="multipart/form-data">
                    <input style="float:left" required type="file" name="fileToUpload"/>
		            <img src="carousel_images/<?php echo $img_name[3];?>" width="70">
					
					<input style="float:right" type="submit"class="btn btn-warning"
                    name="update" value="Update Now">
				</form>
		        </td>
			</tr>
			<tr>
				<td align="right">4:</td>
		        <td>
				<form method="post" action="carousel_img.php?img_id=4&&img=<?php echo $img_name[4]; ?>" enctype="multipart/form-data">
                    <input style="float:left" required type="file" name="fileToUpload"/>
		            <img src="carousel_images/<?php echo $img_name[4];?>" width="70">
					
					<input style="float:right" type="submit"class="btn btn-warning"
                    name="update" value="Update Now">
				</form>
		        </td>
	        </tr>
        </table>
</div>
</body>
</html>
<?php
    include('includes/connect.php');
    if(isset($_POST['update'])) {
		if(isset($_FILES["fileToUpload"])) {
			
		$filename= basename($_FILES["fileToUpload"]["name"]);
		$path="carousel_images/";
	    require"upload_img.php";
		
		if ($uploadOk == 0) {
		    echo"Image not uploaded";
		}
		else {
	
	    $img_id = $_GET['img_id'];	
		$oldimg = $_GET['img'];
		$image2= $randomname;
		
	    $editing = $con->query("UPDATE carousel_images SET img_name='$image2' WHERE img_id='$img_id'");
		
		$imagepath = "carousel_images/".$oldimg;
        unlink($imagepath);
		header('location:carousel_img.php?edited=true');
		};
	    };
    };

?>
<?php }; ?>