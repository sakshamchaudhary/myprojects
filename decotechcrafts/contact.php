<!DOCTYPE html>
<html>
    <?php include('headerfiles.php'); ?>
<body>

	<?php include('navbar.php'); ?>
	
	<div class="container" style="height:100%;" align="center">
	<?php if (@$_GET['sent']) { ?>
	<center><h4 style="color:red;">Email sent!! Thank you.</h4><center><?php } ?>
	<div class="col-md-3"></div>
	<div class="col-md-6" id="contactbox">
        <h2>Leave an email</h2>
        <form role="form" method="post" action="contactback.php">
            <div class="form-group">
                <label for="useremail">Your Email:</label>
                <input required type="email" class="form-control" id="useremail" placeholder="Enter email" name="useremail"/>
            </div>
            <div class="form-group">
                <label for="sub">Subject:</label>
                <input required type="text" class="form-control" id="sub" name="subject" placeholder="Enter subject"/>
            </div>
			<div class="form-group">
                <label for="msg">Comment:</label>
                <textarea required class="form-control" rows="5" id="msg"name="message"></textarea>
            </div>
            
            <button type="submit" class="btn" name="submit">Send Email</button>
        </form>
		
		
		
		</div>
    </div>
	<?php include"footer.php";?>
</body>
</html>