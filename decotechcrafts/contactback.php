<?php
    if(isset($_POST[submit])) 
	{
		$useremail = $_POST['useremail'];
		$message = $_POST['message'];
		$subject = $_POST['subject'];
		$to = "sakshamchaudhary40@gmail.com";
		
		mail($to,$subject,$message,$useremail);
		
		$sub = "mycom.com";
		$msg = "Thank you for sending an email, we wil get to you soon.";
		$from = "sakshamchaudhary40@gmail.com";
		mail($useremail,$sub,$msg,$from);
		
$account="mitcomitconnectuser@gmail.com";
$userpassword="hellomitconnect";
$to="sender@gmail.com";
$from="mitcomitconnectuser@gmail.com";
$from_name="MitConnect";
$msgsent="Msg is <br> $message";



include("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth= true;
$mail->Port = 465; // Or 587
$mail->Username= $account;
$mail->Password= $userpassword;
$mail->SMTPSecure = 'ssl';
$mail->From = $from;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msgsent;
$mail->addAddress($to);
$mail->SMTPDebug = 2;

		header('location:contact.php?sent=true');
	}
?>