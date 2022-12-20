<?php
require('header.php');
$order_id=get_safe_value($con, $_GET['id']);
if(isset($_POST['update_violation_status'])){
   $update_violation_status=$_POST['update_violation_status'];
   mysqli_query($con, "update ecom_users set violation_status='$update_violation_status' where id='$user_id'");
}
if(isset($_POST['update_verify_status'])){
   $update_pverify_status=$_POST['update_verify_status'];
   mysqli_query($con, "update ecom_users set verify_status='$update_verify_status' where id='$user_id'");
}
?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h1 class="h3 mb-2 text-gray-800">User Details</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x:hidden;">
                                
                                <div class="form-group">
							               <div class="row">
								                  <div class="col-lg-6">
                                             <strong>&nbsp;Verify Status: </strong>
                                             <?php 
                                             $verify_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select verify_status.name from verify_status,`ecom_users` where `ecom_usersorders`.id='$user_id' and `ecom_users`.verify_status=verify_status.id"));
                                             echo $verify_status_arr['name'];
                                             ?>
                                                <div>
                                                   <form method="post"><br/>
                                                   <select class="form-control" name="update_verify_status">
										                     <option disabled selected>Select Status</option>
										                     <?php
										                     $res=mysqli_query($con,"select * from verify_status");
										                     while($row=mysqli_fetch_assoc($res)){
											                     if($row['id']==$user_id){
												                     echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											                     }else{
												                     echo "<option value=".$row['id'].">".$row['name']."</option>";
											                     }
										                      }
										                     ?>
									                        </select>
                                                   <input type="submit" class="btn btn-lg btn-primary btn-block" style="background:;"/>
                                                </div>
                                             </div>

                                   <div class="col-lg-6 ">
                                       <strong>&nbsp;Violation Status: </strong>
                                       <?php 
                                       $violation_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select violation_status.name from violation_status,`ecom_users` where `ecom_users`.id='$user_id' and `ecom_users`.violation_status=violation_status.id"));
                                       echo $violation_status_arr['name'];
                                       ?>
                                          <div>
                                             <form method="post"><br/>
                                             <select class="form-control" name="update_violation_status">
										               <option disabled selected>Select Status</option>
										               <?php
										               $res=mysqli_query($con,"select * from violation_status");
										               while($row=mysqli_fetch_assoc($res)){
											               if($row['id']==$user_id){
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