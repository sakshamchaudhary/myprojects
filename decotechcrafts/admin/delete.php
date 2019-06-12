<?php
include('includes/connect.php');
$del_id = @$_GET['del'];

$selectfile = $con->query("select * from posts where post_id='$del_id'");
$row=$selectfile->fetch_assoc();
$imagepath = "Uploads/".$row['post_image'];
unlink($imagepath);
		
$del_query = $con->query("delete from posts where post_id='$del_id'");
if($del_query) {
	header('location:index.php');
}
?>