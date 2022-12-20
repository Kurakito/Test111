<?php 
require('header.php');
$order_id=get_safe_value($con, $_GET['id']);
if(isset($_POST['update_order_status'])){//appointment_status
    $update_order_status=$_POST['update_order_status'];
    mysqli_query($con, "update ecom_orders set order_status='$update_order_status' where id='$order_id'");
    }
?> 

<title>Order Detail</title>
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/script.js"></script>




        <!-- order-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Document Type</th>
                                            <th class="product-name">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select distinct(order_detail.id), order_detail.*,product.name from order_detail,product, ecom_orders where order_detail.order_id='$order_id' and ecom_orders.user_id='$uid' and order_detail.product_id=product.id");
											$total_price=0;
                                            while($row=mysqli_fetch_assoc($res)){
                                            $total_price=$total_price+($row['qty']*$row['price']);

                                            
											?>
											<tr>
												<td class="product-name" id="res1"><span style="font-size:17px;"><?php echo $row['name']?></span></td>
                                                <td class="product-name "><span style="font-size:17px;"><?php echo $row['qty']?></span></td>
											</tr>
											<?php } ?>
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
										               $res=mysqli_query($con,"select * from order_status where id=3");
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

                                    
                                    <div class="row">
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="my_order.php">Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


