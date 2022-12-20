<?php
require('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   if($type=='delete'){
       $id=get_safe_value($con,$_GET['id']);
       $delete_sql="delete from ecom_orders where id='$id'";
       mysqli_query($con,$delete_sql);
   }
}
$sql="Select * from ecom_orders order by id desc";
$res=mysqli_query($con,$sql);
?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <?php
                                             
                                             $sql = "select sum(total_amount) from ecom_orders";
                                             $q = mysqli_query($con,$sql);
                                             $row = mysqli_fetch_array($q);
                                             ?>
                        <h1 class="h3 mb-2 text-gray-800 position-absolute" style="margin-top:8px;">Sales</h1><h6 class="h3 mb-2 font-weight-bold float-right" style="margin-top:5px; margin-right:8px;">Total&nbsp;:&nbsp;P&nbsp;<?php echo $row[0];?></h6></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="text-align:center; font-size:15px;">#</th>
                                        <th style="text-align:center; font-size:15px;">DATE</th>
                                        <th style="text-align:center; font-size:15px;">REFERENCE NO.</th>
                                        <th style="text-align:center; font-size:15px;">PRODUCT NAME</th>
                                        <th style="text-align:center; font-size:15px;">QUANTITY</th>
                                        <th style="text-align:center; font-size:15px;">PRICE</th>
                                        <th style="text-align:center; font-size:15px;">AMOUNT</th>
                                        <th style="text-align:center; font-size:15px;">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
											$res=mysqli_query($con,"select distinct ecom_orders.refno,ecom_orders.id,ecom_orders.added_on, product.name as p_name, order_detail.qty as p_qty, order_detail.price as p_price from ecom_orders, product, order_detail where order_detail.order_id=ecom_orders.id and order_detail.product_id=product.id");
											while($row=mysqli_fetch_assoc($res)){
											?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row['id']?>
                                            </td>
                                            <td style="text-align:center;"><?php echo $row['added_on']?></td>
                                            <td style="text-align:center;"><?php echo $row['refno']?></td>
                                            <td style="text-align:center;"><?php echo $row['p_name']?></td>
                                            <td style="text-align:center;"><?php echo $row['p_qty']?></td>
                                            <td style="text-align:center;"><?php echo $row['p_price']?></td>
                                            <td style="text-align:center;"><?php echo $row['p_qty']*$row['p_price']?></td>
                                            <td style="text-align:center;"><?php 
                                                echo "&nbsp;<span class='btn btn-danger'><a style='color:white; text-decoration:none;' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                                            ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php require('footer.php')?>