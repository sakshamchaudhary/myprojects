<?php
include("includes/connect.php");

if(isset($_POST["submit"])) {

	$filename= basename($_FILES["fileToUpload"]["name"]);
	$path="uploads/";
	include"upload_img.php";
	
	if ($uploadOk == 0) {
		header('location:insert.php?err=true');
	}
    else {
		$insert = $con->prepare( "INSERT INTO posts(post_title,post_content,post_image,category_id,post_date) values(?,?,?,?,?);");
    $insert->bind_param('sssis',$title,$content,$filename2,$category_id,$date);
	$title = $_POST['title'];
	$content = $_POST['content'];
	$category_id = $_POST['category'];
	$filename2= $randomname;
	$date = date('y/m/d');
	$insert->execute();
    $insert->close();
	header('location:insert.php?done=true');
};
};
?>