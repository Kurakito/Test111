<?php
include('vendor/autoload.php');
require('connection.inc.php');
require('functions.inc.php');

if(!$_SESSION['ADMIN_LOGIN']){
    if(!isset($_SESSION['USER_ID'])){
        die();
    }
}


if(isset($_POST['submit'])){
	$start_date=get_safe_value($con,$_POST['start-date']);
	$end_date=get_safe_value($con,$_POST['end-date']);
	$res=mysqli_query($con,"select * from ecom_orders where added_on between '$start_date' and '$end_date'");
	$check=mysqli_num_rows($res);
}


$css=file_get_contents('../css/order_pdf.css');
$js=file_get_contents('js/script.js');
$html='<link rel="stylesheet" href="css/cart.css">
<script src="js/script.js"></script>
<div class="cart-main-area ptb--100 bg__white">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="page-break">
       <div class="sale-head" style="text-align:center;">
           <h1>ACES Sales and Inventory Management System - Sales Report</h1>'; ?>
       <strong><?php echo $start_date;?> TILL DATE <?php echo $end_date;?></strong>
       <?php

              

           $html.='
           </div><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;'.$start_date.' &nbsp; TILL DATE &nbsp; '.$end_date.'</strong>
               <div class="table-content table-responsive">
                  <table style="margin-top:15px;">
                     <thead>
                        <tr>
                           <th class="product-thumbnail" style="font-weight:bold; font-family: Century Gothic;">Date</th>
                           <th class="product-thumbnail" style="font-weight:bold; font-family: Century Gothic;">Product Name</th>
                           <th class="product-name" style="font-weight:bold; font-family: Century Gothic;">Qty</th>
                           <th class="product-price" style="font-weight:bold; font-family: Century Gothic;">Price</th>
                           <th class="product-quantity" style="font-weight:bold; font-family: Century Gothic;">Total Amount</th>
                        </tr>
                     </thead>
                     <tbody>';
                     if(isset($_SESSION['ADMIN_LOGIN'])){
                        $res=mysqli_query($con,"select distinct(order_detail.id), order_detail.*,product.name,product.image from order_detail,product, ecom_orders where order_detail.order_id=ecom_orders.id and order_detail.product_id=product.id and ecom_orders.added_on between '$start_date' and '$end_date' order by added_on asc");
                        $total_price=0;
                        if(mysqli_num_rows($res)==0){
                        echo "<br><br>No data found";
                        }else{
                     
                     while($row=mysqli_fetch_assoc($res)){
                     $total_price=$total_price+($row['qty']*$row['price']);
                     $pp=$row['qty']*$row['price'];
                                            
                     $html.='
                        <tr>
                           <td class="product-name"><span style="font-size:15px; font-family: Century Gothic;">'.$row['added_on'].'</span></td>
                           <td class="product-thumbnail">'.$row['name'].'</td>
                           <td class="product-name"><span style="font-size:15px; font-family: Century Gothic;">'.$row['qty'].'</span></td>
                           <td class="product-name"><span style="font-size:15px; font-family: Century Gothic;">'.$row['price'].'</span></td>
                           <td class="product-name"><span style="font-size:15px; font-family: Century Gothic;">'.$pp.'</span></td>
                        </tr>';
                                                 }
                        $html.='<tr>
                        <tr>
                                                <td colspan="3"></td>
                                                <td class="product-name"><span style="font-weight: bold; font-size: 15px;">Grand Total</span></td>
                                                <td class="product-name"><span style="font-weight: bold; font-size: 15px;">'.$total_price.'</span></td>
											</tr>';
                        $html.='</tbody>
                  </table>
               </div>
         </div>
      </div>
   </div>
</div>';
$mpdf= new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=time().'.pdf';
$mpdf->Output();//$file,'D'
                                          }
                                            }
?>