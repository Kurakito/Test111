<?php
require('header.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		redirect('categories.php');
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories']);
	$res=mysqli_query($con,"select * from categories where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Requirement already exist";
			}
		}else{
			$msg="Requirement already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update categories set categories='$categories' where id='$id'");
		}else{
			mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
		}
		redirect('categories.php');
	}
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Requirement Form</h1><br>
                        </div>
                            <form method="post">
                                <div class="card-body card-block">
                            
                                    <div class="form-group">
									<label for="categories" class=" form-control-label">Requirement</label>
                                        <input type="text" name="categories" placeholder="Enter Requirement Name" class="form-control" required value="<?php echo $categories?>">
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