<?php
require('header.php');
$user_id='';
$violation='';
$status='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from violators where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$user_id=$row['user_id'];
		$violation=$row['violation'];
		$status=$row['status'];
		
	}else{
		redirect('violators.php');
	}
}

if(isset($_POST['submit'])){
	$user_id=get_safe_value($con,$_POST['user_id']);
	$violation=get_safe_value($con,$_POST['violation']);
	$status=get_safe_value($con,$_POST['status']);
	$res=mysqli_query($con,"select * from violators where user_id='$user_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="User ID already exist";
			}
		}else{
			$msg="User ID already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update violators set user_id='$user_id', violation='$violation'");
		}else{
			mysqli_query($con,"insert into violators(user_id,violation,status) values('$user_id','$violation',
			1)");
		}
		redirect('violators.php');
	}
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Violation Form</h1><br>
                        </div>
						<form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">
						   <div class="row">
							<div class="col-lg-3">
                              <label for="categories" class=" form-control-label">User ID</label>
                              <input type="text" name="user_id" placeholder="Enter User ID" class="form-control" required value="<?php echo $user_id?>">
                           </div>
						   <div class="col-lg-9">
                              <label for="categories" class=" form-control-label">Violation</label>
                              <input type="text" name="violation" placeholder="Enter Violation" class="form-control" required value="<?php echo $violation?>">
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