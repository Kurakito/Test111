<?php
require('header.php');
$order_id=get_safe_value($con, $_GET['id']);//appointment_id
if(isset($_POST['update_order_status'])){//appointment_status
   $update_order_status=$_POST['update_order_status'];
   mysqli_query($con, "update ecom_orders set order_status='$update_order_status' where id='$order_id'");
   }
if(isset($_POST['update_payment_status'])){
   $update_payment_status=$_POST['update_payment_status'];
   mysqli_query($con, "update ecom_orders set payment_status='$update_payment_status' where id='$order_id'");
}
?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h1 class="h3 mb-2 text-gray-800">Appointment Details</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x:hidden;">
                                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="text-align:center;">DOCUMENT TYPE</th>
                                        <th style="text-align:center;">QTY</th>
                                        </tr>
</thead>
                                    <tbody>
                                    <?php
											$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name from order_detail,product  where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");
											//$total_price=0;
                                            while($row=mysqli_fetch_assoc($res)){
                                            //$total_price=$total_price+($row['qty']*$row['price']);
											?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row['name']?></td>
                                            <td style="text-align:center;"><?php echo $row['name']?></td>
                                        </tr>
                                        <?php }?>
                                        <!--tr>
                                                <td colspan="2"></td>
                                                <td class="product-name"><span style="font-weight: bold; font-size: 18px;">Total Price</span></td>
                                                <td style="text-align:center;" class="product-name"><span style="font-weight: bold; font-size: 18px;"><?php echo $total_price?></span></td>
											</tr-->
                                    </tbody>
                                </table>
                                

                                   <div class="col-lg-6 ">
                                       <strong>&nbsp;Appointment Status: </strong>
                                       <?php 
                                       $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`ecom_orders` where `ecom_orders`.id='$order_id' and `ecom_orders`.order_status=order_status.id"));
                                       echo $order_status_arr['name'];
                                       ?>
                                          <div>
                                             <form method="post"><br/>
                                             <select class="form-control" name="update_order_status">
										               <option disabled selected>Select Status</option>
										               <?php
										               $res=mysqli_query($con,"select * from order_status where id!=3");
										               while($row=mysqli_fetch_assoc($res)){
											               if($row['id']==$categories_id){
												               echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											               }else{
												               echo "<option value=".$row['id'].">".$row['name']."</option>";
											               }
										               }
										               ?>
									                  </select>
                                             <input type="submit" class="btn btn-lg btn-primary btn-block"/>
                                             </form>
                                          </div>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php require('footer.php')?>