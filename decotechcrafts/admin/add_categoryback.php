<?php
include("includes/connect.php");

if(isset($_POST["category"])) {

		$insert = $con->prepare( "INSERT INTO categories(category_name) values(?);");
    $insert->bind_param('s',$category_name);
	$category_name = $_POST['category'];
	$insert->execute();
    $insert->close();
	header('location:edit_category.php?done=true');
};
?>