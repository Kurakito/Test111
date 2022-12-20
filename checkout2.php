<?php require('header.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
?>

	<script>
	window.location.href='index.php';
		alert("hello");
	</script>
	<?php
}
if(!isset($_SESSION['USER_LOGIN'])){
	?>

	<script>window.location.href='login.php';</script>
	<?php
}


$cart_total=0;
if(isset($_POST['SUBMIT'])){
	$refno=get_safe_value($con,$_POST['refno']);
	$fullname=get_safe_value($con,$_POST['fullname']);
	$address=get_safe_value($con,$_POST['address']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$email=get_safe_value($con,$_POST['email']);
	$user_id=$_SESSION['USER_ID'];
	$purpose=get_safe_value($con,$_POST['purpose']);
	$appoint_date=get_safe_value($con,$_POST['appoint_date']);
	$appoint_time=get_safe_value($con,$_POST['appoint_time']);
		foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'',$key);
		$qty=$val['qty'];
		/*$cart_total=$cart_total+($price*$qty);*/
}
	/*$total_amount=$cart_total;*/
	$payment_status='1';
	/*if($payment_type=='COD'){
		$payment_status='Success';
	}*/
	$order_status='1';
	$added_on=date('Y-m-d');

	mysqli_query($con,"insert into ecom_orders(user_id,fullname,address,mobile,email,payment_status,order_status,added_on,purpose,appoint_date,appoint_time) values('$user_id','$fullname','$address','$mobile','$email','$payment_status','$order_status','$added_on', '$purpose','$appoint_date','$appoint_time')");
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		/*$cart_total=($price*$qty);*/
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,added_on) values('$order_id','$key','$qty','$added_on')");
	}
	
	unset($_SESSION['cart'])
	?>
	<script>window.location.href='thank_you.php';</script>
	<?php
	
	
}
?>
<title><?php echo $meta_title?></title>
<link rel="stylesheet" href="css/checkout2.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>

<body>
<h2></h2>

<div class="checkout-page">
	<div class="billing-detail">

		<br><p style="color:white; font-weight:light; font-size:12px; margin-left:20px; text-transform:none;">Please check if your information is correct before proceeding.</p><br><br>
		<form method="post" class="checkout-form" action="">
		
		<h4 class="heads" style="color:#23c0d1;">Checkout Method</h4>
			
			<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select * from ecom_users where ecom_users.id='$uid'");
											while($row=mysqli_fetch_assoc($res)){
											?>
			<div class="from-group form-inline">
				<label>Full Name:</label>
				<input type="text" name="fullname" id="fullname" placeholder="Your Full Name" value="&nbsp;&nbsp;<?php echo $row['fname']?>&nbsp;<?php echo $row['lname']?>" readonly>
			</div>

<h4 class="heads" style="color:#23c0d1;">Contact Details</h4>

			<div class="from-group form-inline">
				<label>Address:</label>
				<input type="text" name="address" id="address" placeholder="Your Address" value="&nbsp;<?php echo $row['address']?>" readonly>
			</div>
			<div class="from-group form-inline">
				<label>Mobile No.:</label>
				<input type="text" name="mobile" id="mobile" placeholder="Your Mobile Number" value="<?php echo $row['mobile']?>" readonly>
			</div>

			<div class="from-group form-inline">
				<label>Email Address:</label>
				<input type="text" name="email" id="email" placeholder="Email Address" style="text-transform:none;" value="<?php echo $row['email']?>" readonly>
			</div>
			
			<hr class="hr">
			<?php } ?>
			<br>
			<br><br><span class="field_error" id="name_error" style="color:red; margin-left:30px; font-size:12px; font-weight:light;"></span>
	</div>	
	
	<hr class="hr">
	
	<div class="order-summary">
		<div class="checkout-total">
		<form method="post" class="frmPassword" action="">
			<!--h3 style="color:#000; text-align:center; margin-top:5px; font-weight:bold;background:transparent; font-family:Century Gothic; height:30px; align-items:center; font-size:25px;">Profile Picture</h3-->
			<br><h4 class="h42">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Appointment </h4>
			<br><br>
			<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select * from ecom_users where ecom_users.id='$uid'");
											while($row=mysqli_fetch_assoc($res)){
											?>
											
			
			<div class="purpose1">
				<label>Purpose:</label>
				<input type="text" name="purpose" id="purpose2" value=" ">
			</div>
			<div class="dateandtime">
				<label>Date of Appointment</label>
				<input type="date" name="appoint_date"></input>
			</div>

			<div class="dateandtime">
				<label>Time of Appointment</label>
				<input type="time" name="appoint_time"></input>
			</div>
			
		
			<input type="submit" class="submit change" id="submit btn_update_password" name="SUBMIT" value="SUBMIT" style="margin-top:5px; width:83px;">
			<?php } ?>							
		</div>
											
		
	</div>
</div>
</form>
</body>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/script.js"></script>
<?php require('footer.php');?>