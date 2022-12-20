<?php
require('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from users where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql="Select * from ecom_users order by id asc";
$res=mysqli_query($con,$sql);
?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Barangay Certificate Requests</h1><a href="manage_brgy_certificate.php"><h6 class="m-0 font-weight-bold text-primary float-right" style="text-decoration:underline; cursor:pointer;">Add User</h6></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="text-align:center; font-size:13px;">#<br><br></th>
                                        <th style="text-align:center; font-size:13px;">FIRST NAME<br></th>
                                        <th style="text-align:center; font-size:13px;">MIDDLE NAME</th>
                                        <th style="text-align:center; font-size:13px;">LAST NAME<br></th>
                                        <th style="text-align:center; font-size:13px;">GENDER<br><br></th>
                                        <th style="text-align:center; font-size:13px;">BIRTH DATE</th>
                                        <th style="text-align:center; font-size:13px;">ADDRESS<br><br></th>
                                        <th style="text-align:center; font-size:13px;">MOBILE<br><br></th>
                                        <th style="text-align:center; font-size:13px;">EMAIL<br><br></th>
                                        <th style="text-align:center; font-size:13px;">USERNAME<br><br></th>
                                        <th style="text-align:center; font-size:13px;">PASSWORD<br><br></th>
                                        <th style="text-align:center; font-size:13px;">ACTION<br><br></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($res)){
                                        ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row['id']?></td>
                                            <td style="text-align:center;"><?php echo $row['fname']?></td>
                                            <td style="text-align:center;"><?php echo $row['mname']?></td>
                                            <td style="text-align:center;"><?php echo $row['lname']?></td>
                                            <td style="text-align:center;"><?php echo $row['gender']?></td>
                                            <td style="text-align:center;"><?php echo $row['bdate']?></td>
                                            <td style="text-align:center;"><?php echo $row['address']?></td>
                                            <td style="text-align:center;"><?php echo $row['mobile']?></td>
                                            <td style="text-align:center;"><?php echo $row['email']?></td>
                                            <td style="text-align:center;"><?php echo $row['username']?></td>
                                            <td style="text-align:center;"><?php echo $row['password']?></td>
                                            <td style="text-align:center;"><?php 
                                            /*if($row['status']==1){
                                                echo "<span class='btn btn-success'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                            }else{
                                                echo "<span class='btn btn-info'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                            }*/
                                                echo "<span class='btn btn-warning' style='width:60px; height:35px;'><a style='color:white; text-decoration:none; font-size:12px;' href='manage_brgy_certificate.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                                                echo "<span class='btn btn-danger' style='width:65px; height:35px;'><a style='color:white; text-decoration:none; font-size:12px;' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
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