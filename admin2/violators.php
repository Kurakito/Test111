<?php
require('header.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='active'){
            $status='1';
        }else{
            $status='2';
        }
        $update_status_sql="update ecom_users set violation_status='$status' where id='$id'";
        mysqli_query($con,$update_status_sql);
    }
}
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from ecom_users where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql="Select * from ecom_users where violation_status='1' order by id asc";
$res=mysqli_query($con,$sql);
?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Violators (Active)</h1><a href="manage_violator.php"><h6 class="m-0 font-weight-bold text-primary float-right" style="text-decoration:underline; cursor:pointer;">Add Violator</h6></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="text-align:center; font-size:13px;">#<br></th>
                                        <th style="text-align:center; font-size:13px;">FULL NAME<br></th>
                                        <th style="text-align:center; font-size:13px;">ADDRESS<br></th>
                                        <th style="text-align:center; font-size:13px;">MOBILE<br></th>
                                        <th style="text-align:center; font-size:13px;">EMAIL<br></th>
                                        <th style="text-align:center; font-size:13px;">VIOLATION</th>
                                        <th style="text-align:center; font-size:13px;">ACTION<br></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($res)){
                                        ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row['id']?></td>
                                            <td style="text-align:center;"><?php echo $row['fname']?>&nbsp;<?php echo $row['lname']?></td>
                                            <td style="text-align:center;"><?php echo $row['address']?></td>
                                            <td style="text-align:center;"><?php echo $row['mobile']?></td>
                                            <td style="text-align:center;"><?php echo $row['email']?></td>
                                            <td style="text-align:center;"><?php echo $row['violation']?></td>
                                            <td style="text-align:center;"><?php 
                                           if($row['violation_status']==1){
                                               echo "<span class='btn btn-success'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                           }else{
                                               echo "<span class='btn btn-info'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                           }
                                           echo "&nbsp;<span class='btn btn-warning' style='width:60px;'><a style='color:white; text-decoration:none; font-size:14px;' href='manage_violator.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                                           echo "&nbsp;<span class='btn btn-danger'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
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