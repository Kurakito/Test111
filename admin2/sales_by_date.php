<?php
require('header.php');
$start_date='';
$end_date='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from ecom_orders where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$start_date=$row['added_on'];
		$end_date=$row['added_on'];
	}else{
		redirect('orders.php');
	}
}

if(isset($_POST['submit'])){
	$start_date=get_safe_value($con,$_POST['start-date']);
	$end_date=get_safe_value($con,$_POST['end-date']);
	$res=mysqli_query($con,"select distinct ecom_orders.refno,ecom_orders.id,ecom_orders.added_on, product.name as p_name, order_detail.qty as p_qty, order_detail.price as p_price from ecom_orders, product, order_detail where order_detail.order_id=ecom_orders.id and order_detail.product_id=product.id where ecom_orders.added_on between '$start_date' and '$end_date'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Category already exist";
			}
		}else{
			$msg="Category already exist";
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
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Sales Invoice / Report by Date</h1><br>
                        </div>
                            <form method="post" action="sales_date_pdf.php">
                                <div class="card-body card-block">
                            
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
										<label for="categories" class=" form-control-label">From</label>
												<input type="date" name="start-date" placeholder="From" class="form-control" required value="">
										</div>


										<div class="col-lg-6">
												<label for="categories" class=" form-control-label">To</label>
												<input type="date" name="end-date" placeholder="To" class="form-control" required value="">
										</div>

									</div>
								</div>
                                <button id="payment-button" name="submit" type="submit" onclick="sales_date_pdf.php" class="btn btn-lg btn-primary btn-block">
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