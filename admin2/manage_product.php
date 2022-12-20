<?php
require('header.php');
require_once('connection.inc.php');
$name='';
$short_desc	='';
$description ='';
$main_product='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$main_product=$row['main_product'];

	} else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$main_product=get_safe_value($con,$_POST['main_product']);
	
	$res=mysqli_query($con,"select * from product where name='$name'");
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
			if(['name']!=''){
				$update_sql="update product set name='$name',short_desc='$short_desc',description='$description',main_product='$main_product' where id='$id'";
			}else{
				$update_sql="update product set name='$name',short_desc='$short_desc',description='$description',main_product='$main_product' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into product(name,short_desc,description,status,main_product) values('$name','$short_desc','$description',1,'$main_product')");
		}
		redirect('product.php');
		die();
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
						<form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label for="categories" class=" form-control-label">Requirement Name</label>
											<input type="text" name="name" placeholder="Enter Requirement Name" class="form-control" required value="<?php echo $name?>">
										</div>
									
								

								<div class="col-lg-6">
									<label for="categories" class=" form-control-label">Main Service</label>
									<select class="form-control" name="main_product" required>
									<option value='' disabled selected>Select Option</option>
									<?php
									if($main_product==1){
										echo '<option value="1" selected>Yes</option>
										<option value="0">No</option>';
									}elseif($main_product==0){
										echo '<option value="1">Yes</option>
										<option value="0" selected>No</option>';
									}else{
										echo '<option value="1">Yes</option>
										<option value="0">No</option>';
									}
									?>
									</select>
								</div>
							</div>
							</div>
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_desc" placeholder="Enter Product Short Description" class="form-control" required><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter Product Description" class="form-control" required><?php echo $description?></textarea>
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
                        
                    
                <!-- /.container-fluid -->

            
            <!-- End of Main Content -->

			
         
<?php
require('footer.php');
?>