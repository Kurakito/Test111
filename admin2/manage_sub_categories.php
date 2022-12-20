<?php
require('header.php');
$categories='';
$msg='';
$sub_categories='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sub_categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$sub_categories=$row['sub_categories'];
		$categories=$row['categories_id'];
	}else{
		redirect('sub_categories.php');
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories_id']);
	$sub_categories=get_safe_value($con,$_POST['sub_categories']);
	$res=mysqli_query($con,"select * from sub_categories where categories_id='$categories' and sub_categories='$sub_categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Sub Categories already exist";
			}
		}else{
			$msg="Sub Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update sub_categories set categories_id='$categories',sub_categories='$sub_categories' where id='$id'");
		}else{
			
			mysqli_query($con,"insert into sub_categories(categories_id,sub_categories,status) values('$categories','$sub_categories','1')");
		}
		redirect('sub_categories.php');
	}
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Sub Categories Form</h1><br>
                        </div>
                            <form method="post">
                                <div class="card-body card-block">
                            
                                    <div class="form-group">
									<label for="categories" class=" form-control-label">Category</label>
									<select class="form-control" name="categories_id" required>
										<option disabled selected>Select Category</option>
										<?php
										$res=mysqli_query($con,"select * from categories where status='1'");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories){
												echo "<option value=".$row['id']." selected>".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
							</div>
							<div class="form-group">
									<label for="categories" class=" form-control-label">Sub Categories Name</label>
									<input type="text" name="sub_categories" placeholder="Enter Sub Category" class="form-control" required value="<?php echo $sub_categories?>">
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