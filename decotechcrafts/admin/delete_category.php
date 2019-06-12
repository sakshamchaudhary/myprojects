<?php
include('includes/connect.php');
$category_id = @$_GET['del'];

$select = $con->query("select * from posts where category_id='$category_id';");
if($select->num_rows>0){
    header('location:edit_category.php?err="true"');
} else {
    $del_query = $con->query("delete from categories where category_id='$category_id';");
    if($del_query) {
	header('location:edit_category.php');
    }
};
?>