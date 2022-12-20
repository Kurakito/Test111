<?php 
require('header.php');
?>

<title>Document Query</title>
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/script.js"></script>




        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Document Type</th>
                                            <th class="product-quantity">Quantity</th>
                                            <!--th class="product-quantity">Purpose</th-->
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'',$key);
											$pname=$productArr[0]['name'];
											$qty=$val['qty'];
											?>
											<tr>
												<td class="product-name"><a href="#"><?php echo $pname?></a></td>
												<td class="product-quantity"><input type="number" min="1" max="3" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br><br><a href="javascript:void(0)"  class="update" onclick="manage_cart('<?php echo $key?>','update')">Update</a>
												</td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><span class="fas fa-trash"></span></a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--style>
                                input[type=number]::-webkit-inner-spin-button, 
                                input[type=number]::-webkit-outer-spin-button { 
                                    -webkit-appearance: none; 
                                    margin: 0; 
}
                            </style-->
                            <?php
	if(isset($_SESSION['USER_LOGIN'])){
	$class="";
	}
	?>
                            <div class="row">
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="index.php#product">Go Back</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="checkout2.php">Proceed</a><!--a href="?php echo SITE_PATH?>checkout2.php">checkout</a-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


