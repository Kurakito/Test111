<?php
require('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from contact_us where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql="Select * from contact_us order by id desc";
$res=mysqli_query($con,$sql);
?> 

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-3">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Messages</h1><br>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th style="text-align:center; font-size:15px;">#</th>
                                        <th width="20%" style="text-align:center; font-size:15px;">NAME</th>
                                        <th style="text-align:center; font-size:15px;">QUERY</th>
                                        <th width="20%" style="text-align:center; font-size:15px;">DATE</th>
                                        <th width="15%" style="text-align:center; font-size:15px;">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row['id']?></td>
                                            <td style="text-align:center;"><?php echo $row['name']?></td>
                                            <td style="text-align:center;"><?php echo $row['comment']?></td>
                                            <td style="text-align:center;"><?php echo $row['added_on']?></td>
                                            <td style="text-align:center;"><?php 
                                                echo "<span class='btn btn-danger'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
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