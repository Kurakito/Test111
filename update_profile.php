<?php
require('connection.inc.php');
require('functions.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];
$fname=get_safe_value($con,$_POST['fname']);
$mname=get_safe_value($con,$_POST['mname']);
$lname=get_safe_value($con,$_POST['lname']);
$gender=get_safe_value($con,$_POST['gender']);
$bdate=get_safe_value($con,$_POST['bdate']);
$bplace=get_safe_value($con,$_POST['bplace']);
$address=get_safe_value($con,$_POST['address']);
$mobile=get_safe_value($con,$_POST['mobile']);
$email=get_safe_value($con,$_POST['email']);
mysqli_query($con,"update ecom_users set fname='$fname',mname='$mname',lname='$lname',gender='$gender',bdate='$bdate',bplace='$bplace',address='$address',mobile='$mobile',email='$email' where id='$uid'");
echo "Your Profile Information has been updated";
?>