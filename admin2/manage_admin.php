<?php
require('header.php');
$name='';
$username='';
$password='admin';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from admin_users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
        $username=$row['username'];
        $password=$row['password'];
	}else{
		redirect('admin.php');
	}
}

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
    $username=get_safe_value($con,$_POST['username']);
    //$password=md5($password);
	$res=mysqli_query($con,"select * from admin_users where username='$username'");
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
			mysqli_query($con,"update admin_users set name='$name',username='$username',password='$password' where id='$id'");
		}else{
			mysqli_query($con,"insert into admin_users(name,username,password) values('$name','$username','admin')");
		}
		redirect('admin.php');
	}
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Admin Form</h1><br>
                        </div>
                            <form method="post">
                                <div class="card-body card-block">
                            
                                <div class="form-group">
                                    <div class="row">
										<div class="col-lg-6">
                                            <label for="categories" class=" form-control-label">Name</label>
                                                <input type="text" name="name" placeholder="Enter Name" class="form-control" required value="<?php echo $name?>">
                                        </div>

                                        <div class="col-lg-6">
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
                                
                                    </div>
                        
                    
                <!-- /.container-fluid -->

            
            <!-- End of Main Content -->

           <?php require('footer.php')?>