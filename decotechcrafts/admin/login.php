<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <?php include('headerfiles.php'); ?>
<body>
    <div class="container">

	<div class="col-md-3"></div>
	<div class="col-md-6" id="contactbox">
        <center><h2>Admin login</h2></center>
        <form role="form" method="post" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input required type="text" class="form-control" id="username" placeholder="Enter email" name="user_name"/>
            </div>
            <div class="form-group">
                <label for="sub">Password:</label>
                <input required type="password" class="form-control" id="sub" name="user_pass" placeholder="Enter password"/>
            </div>
            <center><button type="submit" class="btn btn-info" name="login">Login</button></center>
        </form>
		
		
		
		</div>
    </div>
</body>
</html>
<?php
if (isset($_POST['login'])) {
	include('includes/connect.php');
	$user_name = $_POST['user_name'];
	$user_pass = $_POST['user_pass'];
	
	$login_query = $con->query("select * from admin_login where user_name=
	'$user_name' AND user_password = '$user_pass'");
	if($login_query->num_rows>0) {
		$_SESSION['user_name'] = $user_name; //to enter into session on index.php
		echo "<script>window.open('index.php','_self')</script>";
	} else {
		echo "<center style='color:red'><h2>Invalid username or password!</h2></center>";
	};
};
?>
