<?php require('header.php');

$cart_total=0;
if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$qty=get_safe_value($con,$_POST['qty']);
	$total=get_safe_value($con,$_POST['total']);
	$date=get_safe_value($con,$_POST['date']);
	$address=get_safe_value($con,$_POST['address']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$email=get_safe_value($con,$_POST['email']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];
		foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
}
	$total_amount=$cart_total;
	$payment_status='1';
	/*if($payment_type=='COD'){
		$payment_status='Success';
	}*/
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	

	mysqli_query($con,"insert into ecom_orders(user_id,refno,fullname,studno,course,address,mobile,email,payment_type,total_amount,payment_status,order_status,added_on) values('$user_id','$refno','$fullname','$studno','$course','$address','$mobile','$email','$payment_type','$total_amount','$payment_status','$order_status','$added_on')");
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price,added_on) values('$order_id','$key','$qty','$price','$added_on')");
	}
	
	unset($_SESSION['cart'])
	?>
	<script>window.location.href='thank_you.php';</script>
	<?php
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Sales Form</h1><br>
                        </div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
									<label for="categories" class=" form-control-label">Product Name</label>
									<select class="form-control" name="name" id="name" onchange="get_sub_cat('')" required>
										<option disabled selected>Select Product</option>
										<?php
										$res=mysqli_query($con,"select id,name from product order by id asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								
								<div class="col-lg-2">
									<label for="categories" class=" form-control-label">Quantity</label>
									<input type="text" name="qty" placeholder="Qty" class="form-control" required value="">
								</div>

								<div class="col-lg-2">
									<label for="categories" class=" form-control-label">Selling Price</label>
									<input type="text" name="price" placeholder="Total Amount" class="form-control" required value="">
								</div>

								<div class="col-lg-2">
									<label for="categories" class=" form-control-label">Total Amount</label>
									<input type="text" name="total" placeholder="Total Amount" class="form-control" required value="">
								</div>
								<div class="col-lg-3">
									<label for="categories" class=" form-control-label">Date</label>
									<input type="date" name="date" placeholder="Enter Date" class="form-control" required value="">
                    			</div>
									</div><br>
									
							    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-primary btn-block">
							   		<span id="payment-button-amount">Submit</span>
                                </button>
                                
							</div>
						</form>
                    </div>
                                    </div></div>
                        
                    
                <!-- /.container-fluid -->

            
            <!-- End of Main Content -->

			<script>
			function get_sub_cat(sub_cat_id){
				var categories_id=jQuery('#categories_id').val();
				jQuery.ajax({
					url:'get_sub_cat.php',
					type:'post',
					data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
					success:function(result){
						jQuery('#sub_categories_id').html(result);
					}
				});
			}
		 </script>
         
<?php
require('footer.php');
?>
