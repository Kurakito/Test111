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
			$status='0';
		}
		$update_status_sql="update sub_categories set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from sub_categories where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select sub_categories.*,categories.categories from sub_categories,categories where categories.id=sub_categories.categories_id order by sub_categories.id asc";
$res=mysqli_query($con,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-4">
                        <h1 class="h3 mb-2 text-gray-800 position-absolute">Sub Categories</h1><a href="manage_sub_categories.php"><h6 class="m-0 font-weight-bold text-primary float-right" style="text-decoration:underline; cursor:pointer;">Add Sub Category</h6></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">#</th>
                                            <th width="30%" style="text-align:center;">CATEGORIES</th>
                                            <th width="30%" style="text-align:center;">SUB CATEGORIES</th>
                                            <th width="25%" style="text-align:center;">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i=1;
                                        while($row=mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row['id']?></td>
                                            <td style="text-align:center;"><?php echo $row['categories']?></td>
                                            <td style="text-align:center;"><?php echo $row['sub_categories']?></td>
                                            <td style="text-align:center;"><?php 
                                           if($row['status']==1){
                                               echo "<span class='btn btn-success'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                           }else{
                                               echo "<span class='btn btn-info'><a style='color:white; text-decoration:none; font-size:14px;' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                           }
                                           echo "&nbsp;<span class='btn btn-warning' style='width:60px;'><a style='color:white; text-decoration:none; font-size:14px;' href='manage_sub_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
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