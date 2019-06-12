<?php
$servername = "localhost";
$username = "root";
$serpass = "";
$da="mhcddb";
$conn = mysqli_connect($servername, $username);
if ($conn) 
{
	$ds=mysqli_select_db($conn,$da);
if(!$ds)
{
	echo mysqli_error();
exit();	

}
	}
	
?>