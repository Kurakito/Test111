<?php
require('connection.inc.php');
require('functions.inc.php');

$email=get_safe_value($con,$_POST['email']);
$res=mysqli_query($con,"select * from ecom_users where email='$email'");
$check_user=mysqli_num_rows($res);

if($check_user>0){
	echo "<style='color:red;'>Your Password is in your Email, Please Check</style>";

	$row=mysqli_fetch_assoc($res);
	$pwd=$row['password'];
	$html="Your password is <strong>$pwd</strong>";
	
	include('mailer/Mailer.php');

	Mailer::sendMessage($email, "Your Password", $html);
}else{
	echo "Email Address not registered with us";
	die();
}
?>