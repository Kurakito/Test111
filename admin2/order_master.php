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
                        <h1 class="h3 mb-2 text-gray-800">Appointments</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="text-align:center; font-size:13px;">APPOINTMENT #<br><br></th>
                                        <th style="text-align:center; font-size:13px;">APPOINTMENT DATE<br><br></th>
                                        <th style="text-align:center; font-size:13px;">USER<br><br></th>
                                        <!--th style="text-align:center; font-size:13px;">AMOUNT<br><br></th-->
                                        <!--th style="text-align:center; font-size:13px;">PAYMENT TYPE<br><br></th>
                                        <th style="text-align:center; font-size:13px;">PAYMENT STATUS<br><br></th-->
                                        <th style="text-align:center; font-size:13px;">APPOINTMENT STATUS<br><br></th>
                                        <th style="text-align:center; font-size:13px;">ACTION<br><br></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
											$res=mysqli_query($con,"select ecom_orders.*,order_status.name as order_status_str,payment_status.name as payment_status_str from ecom_orders, order_status,payment_status where order_status.id=ecom_orders.order_status and payment_status.id=ecom_orders.payment_status order by id desc");
											while($row=mysqli_fetch_assoc($res)){
											?>
                                        <tr>
                                            <td style="text-align:center;"><span class='btn btn-success'><a href="order_master_detail.php?id=<?php echo $row['id']?>" style='color:white; text-decoration:none; font-size:12px;'>&nbsp;&nbsp;<?php echo $row['id']?>&nbsp;&nbsp;&nbsp;</a></span>
                                            <br/>
                                            <span class='btn btn-warning'><a href="../order_pdf.php?id=<?php echo $row['id']?>" style='color:white; text-decoration:none; font-size:12px;'>PDF</a></span>
                                            </td>
                                            <td style="text-align:center;"><?php echo $row['added_on']?></td>
                                            <td style="text-align:center;"><?php echo $row['fullname']?><br/>
												         &nbsp;&nbsp;<?php echo $row['email']?><br/>
												         <?php echo $row['mobile']?></td>
                                            <!--td style="text-align:center;"></td-->
                                            <td style="text-align:center;"><?php echo $row['order_status_str']?></td>
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