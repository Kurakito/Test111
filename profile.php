<?php require('header.php');
if(!isset($_SESSION['USER_LOGIN'])){
?>
<script>
	window.location.href='index.php';
</script>
<?php } 
?>
<title><?php echo $meta_title?></title>
<link rel="stylesheet" href="css/profile.css">
<script src="js/script.js"></script>
<script>
	$(document).ready(function(){
		$('input[type="radio"]').change(function(){
			if(this.value=='Gcash'){
				$('#gcashtext').css('display', 'block');
			}else{
				$('#gcashtext').css('display', 'none');
			}
		});
	});
</script>

<body>
<h2></h2>

<div class="checkout-page">
	<div class="billing-detail">


		<br>
		<form method="post" class="checkout-form" action="">
		<h4 class="h4">My Profile</h4><br>
		<h4 class="heads" style="color:#23c0d1;">Personal Details</h4>
			<div class="from-group form-inline">
				<br><label>Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="username" id="username" placeholder="Your Username" value="<?php echo $_SESSION['USER_NAME']?>" readonly>

			</div>
			<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select * from ecom_users where ecom_users.id='$uid'");
											while($row=mysqli_fetch_assoc($res)){
											?>
			<div class="from-group form-inline">
				<label>First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="fname" id="fname" placeholder="Your First Name" value="<?php echo $row['fname']?>">
			</div>

			<div class="from-group form-inline">
				<label>Middle Name&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="mname" id="mname" placeholder="Your Middle Name" value="<?php echo $row['mname']?>">
			</div>

			<div class="from-group form-inline">
				<label>Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="lname" id="lname" placeholder="Your Last Name" value="<?php echo $row['lname']?>">
			</div>

			<div class="from-group form-inline">
				<label>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="gender" id="gender" placeholder="Your Gender" value="<?php echo $row['gender']?>">
			</div>

			<div class="from-group form-inline">
				<label style="text-transform: none;">Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp; :</label>
				<input type="text" name="bdate" id="bdate" placeholder="Your Birth Date" value="<?php echo $row['bdate']?>">
			</div>

			<div class="from-group form-inline">
				<label style="text-transform: none;">Place of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp; :</label>
				<input type="text" name="bplace" id="bplace" placeholder="Your Birth Place" value="<?php echo $row['bplace']?>">
			</div>

			<hr class="hr">

<h4 class="heads" style="color:#23c0d1;">Address Details</h4>

			<div class="from-group form-inline">
				<label>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="address" id="address" placeholder="Your Address" value="<?php echo $row['address']?>">
			</div>
			<hr class="hr">


<h4 class="heads" style="color:#23c0d1;">Contact Details</h4>
			<div class="from-group form-inline">
				<label>Mobile No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="mobile" id="mobile" placeholder="Your Mobile Number" value="<?php echo $row['mobile']?>">
			</div>

			<div class="from-group form-inline">
				<label>Email Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="email" id="email" placeholder="Email Address" style="text-transform:none;" value="<?php echo $row['email']?>">
			</div>
			<hr class="hr">

<h4 class="heads" style="color:#23c0d1;">Status</h4>
			<div class="from-group form-inline">
			<?php 
			$uid = $_SESSION['USER_ID'];
                                     $ros=mysqli_query($con,"select ecom_users.*,violation_status.name as violation_status_str,verify_status.name as verify_status_str from ecom_users, violation_status,verify_status where ecom_users.id=$uid and violation_status.id=ecom_users.violation_status and verify_status.id=ecom_users.verify_status");
											while($row=mysqli_fetch_assoc($ros)){
                                        
                                        ?>
				<label>Violation Status&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
				<input type="text" name="violation_status" id="violation_status" placeholder="Your Mobile Number" value="<?php echo $row['violation_status_str']?>" readonly>
				
			</div>

			<div class="from-group form-inline">
				<label>Verification Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				:</label>
				<input type="text" name="verify_status" id="verify_status" placeholder="Email Address" style="text-transform:none;" value="<?php echo $row['verify_status_str']?>" readonly>
				<?php }?>
			</div>
			<hr class=	"hr">
			<?php } ?>
			<br>
			<input type="submit" class="save" id="btn_submit" name="submit" value="Save" onclick="update_profile()">
			<br><br><span class="field_error" id="name_error" style="color:red; margin-left:30px; font-size:12px; font-weight:light;"></span>
	</div>	
	
	<hr class="hr">
	
	<div class="order-summary">
		<div class="checkout-total">
		<form method="post" class="frmPassword" action="">
			<!--h3 style="color:#000; text-align:center; margin-top:5px; font-weight:bold;background:transparent; font-family:Century Gothic; height:30px; align-items:center; font-size:25px;">Profile Picture</h3-->
			<br><br><h4 class="h42">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Change Password</h4>
				
			<div class="from-group">
				<br><br>
				<label style="margin-left:20px; color:#ddd; font-weight:bold;">Current Password&nbsp;:</label>
				<input type="password" name="current_password" id="current_password" style="height:18px; font-size:16px; background:transparent; margin-left:5px; border-bottom:1px solid #2C2B30;">
			</div>
			
			<div class="from-group">
				<br>
				<label style="margin-left:20px; color:#ddd; font-weight:bold;">New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;</label>
				<input type="password" name="new_password" id="new_password" style="position:absolute; height:18px; font-size:16px; background:transparent; margin-left:5px; border-bottom:1px solid #2C2B30;">
			</div>
			
			<div class="from-group">
				<br>
				<label style="margin-left:20px; color:#ddd; font-weight:bold;">Confirm Password :</label>
				<input type="password" name="confirm_new_password" id="confirm_new_password" style="height:18px; font-size:16px; background:transparent; margin-left:5px; border-bottom:1px solid #2C2B30;">
			</div>
			
			<br><br>
			<input type="submit" class="change" id="btn_update_password" name="submit" value="Save" onclick="update_password(); window.location.reload();" >
									
		</div>
											
		
	</div>
</div>
</form>
<script>
	function update_profile(){
	var fname=jQuery("#fname").val();
	var mname=jQuery("#mname").val();
	var lname=jQuery("#lname").val();
	var gender=jQuery("#gender").val();
	var bdate=jQuery("#bdate").val();
	var bplace=jQuery("#bplace").val();
	var address=jQuery("#address").val();
	var mobile=jQuery("#mobile").val();
	var email=jQuery("#email").val();
	
	
	if(fname==""){
		alert('Fields cannot be empty!');
	}else if(mname==""){
		alert('Fields cannot be empty!');
	}else if(lname==""){
		alert('Fields cannot be empty!');
	}else if(gender==""){
		alert('Fields cannot be empty!');
	}else if(bdate==""){
		alert('Fields cannot be empty!');
	}else if(bplace==""){
		alert('Fields cannot be empty!');
	}else if(address==""){
		alert('Fields cannot be empty!');
	}else if(mobile==""){
		alert('Fields cannot be empty!');
	}else if(email==""){
		alert('Fields cannot be empty!');
	}else{
		jQuery('#btn_submit').attr('disabled',true);
		jQuery.ajax({
			url:'update_profile.php',
			type:'post',
			data:'&fname='+fname+'&mname='+mname+'&lname='+lname+'&gender='+gender+'&bdate='+bdate+'&bplace='+bplace+'&address='+address+'&mobile='+mobile+'&email='+email,
			success:function(result){
				alert(result);
				jQuery('#btn_submit').html('Update');
				jQuery('#btn_submit').attr('disabled',false);
			}
		})
	}
}
function update_password(){
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password=='' || new_password=='' || confirm_new_password==''){
				alert('Fields cannot be empty!');
				is_error='yes';
			}
			else if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				alert('Password does not match, please try again...');
				is_error='yes';
			}
			
			if(is_error==''){
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						alert(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
			
		}
</script>
</body>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/script.js"></script>
<?php require('footer.php');?>


