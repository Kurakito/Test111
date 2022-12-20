<?php
require('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from admin_users where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql="Select * from admin_users order by id asc";
$res=mysqli_query($con,$sql);
?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Admin</h1><a href="manage_admin.php"><h6 class="m-0 font-weight-bold text-primary float-right" style="text-decoration:underline; cursor:pointer;">Add Admin</h6></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="text-align:center; font-size:13px;">#<br><br></th>
                                        <th style="text-align:center; font-size:13px;">NAME<br></th>
                                        <th style="text-align:center; font-size:13px;">USERNAME</th>
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
                                            <td style="text-align:center;"><?php echo $row['name']?></td>
                                            <td style="text-align:center;"><?php echo $row['username']?></td>
                                            <td style="text-align:center;"><?php 
                                                echo "<span class='btn btn-warning' style='width:60px; height:35px;'><a style='color:white; text-decoration:none; font-size:12px;' href='manage_admin.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
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