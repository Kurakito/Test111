<?php
require('header.php');
$fname='';
$mname='';
$lname='';
$gender='';
$bdate='';
$address='';
$mobile='';
$email='';
$username='';
$password='7777';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$fname=$row['fname'];
		$mname=$row['mname'];
		$lname=$row['lname'];
		$gender=$row['gender'];
		$bdate=$row['bdate'];
		$address=$row['address'];
		$mobile=$row['mobile'];
		$email=$row['email'];
		$username=$row['username'];
		$password=$row['password'];
	}else{
		redirect('categories.php');
	}
}

if(isset($_POST['submit'])){
	$fname=get_safe_value($con,$_POST['fname']);
	$mname=get_safe_value($con,$_POST['mname']);
	$lname=get_safe_value($con,$_POST['lname']);
	$gender=get_safe_value($con,$_POST['gender']);
	$bdate=get_safe_value($con,$_POST['bdate']);
	$address=get_safe_value($con,$_POST['address']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$email=get_safe_value($con,$_POST['email']);
	$username=get_safe_value($con,$_POST['username']);
	$res=mysqli_query($con,"select * from users where username='$username'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Username already exist";
			}
		}else{
			$msg="Username already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update users set fname='$fname', mname='$mname',lname='$lname',gender='$gender',
			bdate='$bdate',address='$address',mobile='$mobile',
			email='$email',username='$username',password='$password', where id='$id'");
		}else{
			mysqli_query($con,"insert into users(fname,mname,lname,gender,bdate,address,mobile,email,username,password) values('$fname','$mname',
			'$lname','$gender','$bdate','$address','$mobile','$email','$username','7777')");
		}
		redirect('users.php');
	}
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">User Form</h1><br>
                        </div>
						<form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">
						   <div class="row">
							<div class="col-lg-4">
                              <label for="categories" class=" form-control-label">First Name</label>
                              <input type="text" name="fname" placeholder="Enter First Name" class="form-control" required value="<?php echo $fname?>">
                           </div>
						   <div class="col-lg-4">
                              <label for="categories" class=" form-control-label">Middle Name</label>
                              <input type="text" name="mname" placeholder="Enter Middle Name" class="form-control" required value="<?php echo $mname?>">
                           </div>
						   <div class="col-lg-4">
                              <label for="categories" class=" form-control-label">Last Name</label>
                              <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required value="<?php echo $lname?>">
                           </div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
									<label for="categories" class=" form-control-label">Gender</label>
									<select class="form-control" name="gender" required>
									<option value='' disabled selected>Select Gender</option>
									<?php
									if($gender=='Male'){
										echo '<option value="Male" selected>Male</option>
										<option value="Female">Female</option>';
									}elseif($gender=='Female'){
										echo '<option value="Female">Yes</option>
										<option value="Male" selected>No</option>';
									}else{
										echo '<option value="Male">Male</option>
										<option value="Female">Female</option>';
									}
									?>
									</select>
					</div>


					<div class="col-lg-6">
                              <label for="categories" class=" form-control-label">Birth Date</label>
                              <input type="date" name="bdate" placeholder="Enter Birth Date" class="form-control" required value="<?php echo $bdate?>">
                    </div>

					
					</div>

						   <div class="form-group">
                              <label for="categories" class=" form-control-label" style="margin-top:10px;">Address</label>
                              <input type="text" name="address" placeholder="Enter Address" class="form-control" required value="<?php echo $address?>">
                           </div>

						  

						   <div class="form-group">
						   <div class="row">
							<div class="col-lg-4">
                              <label for="categories" class=" form-control-label">Mobile Number</label>
                              <input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control" required value="<?php echo $mobile?>">
                           </div>
						   <div class="col-lg-4">
                              <label for="categories" class=" form-control-label">Email Address</label>
                              <input type="text" name="email" placeholder="Enter Email Address" class="form-control" required value="<?php echo $email?>">
                           </div>
						   <div class="col-lg-4">
                              <label for="categories" class=" form-control-label">Username</label>
                              <input type="text" name="username" placeholder="Enter Username" class="form-control" required value="<?php echo $username?>">
                           </div>
								</div>
								</div>
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-primary btn-block">
                           <span id="payment-button-amount">Submit</span>
                                </button>
                                <br>
                                <div style="color:red;"><?php echo $msg?></div>
                                </div>
                                </form>
                                </div>
                                
                                    </div></div>
                        
                    
<?php
require('footer.php');
?>