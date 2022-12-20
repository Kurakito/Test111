<?php 
require('header.php');
$order_id=get_safe_value($con, $_GET['id']);
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
                                <div class="buttons-cart">
                                            <a href="my_order.php"><i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                    <button style="font-size:24px"><i class="fa fa-arrow-circle-left">return</i></button>
                                
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


