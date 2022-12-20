<?php
require('connection.inc.php');
require('functions.inc.php');
$cat_res = mysqli_query($con, "select * from product where status=1 order by id asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
		$cat_arr[]=$row;
}
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
        header('location:login.php');
        die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="logo/png" href="../img/logo.png">

    <title>Barangay Incident Record Tracking System</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<style>
.sidebar-brand-icon img {
max-width: 100%;
}
</style>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class=""></i>
                    <img src="img/logo.png" style="margin-top:30px; margin-left:30px; height: 100px; width:120px;" alt="">
                </div>
                <!--div class="sidebar-brand-text mx-3">ACES COMPUTER CLUB</div-->
            </a><br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw">&#xf07b;</i>
                    <span>Documents</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                    <?php
                    foreach($cat_arr as $list){
                    ?>
                        <a class="collapse-item" href="brgy_id.php"><?php echo $list['name']?></a>
                    <?php }?>   
                        <a class="collapse-item" href="product.php"> Manage Documents</a>
                        <a class="collapse-item" href="manage_product.php">Add Document</a>
                     
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Appointments</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--h6 class="collapse-header">Custom Components:</h6-->
                        <a class="collapse-item" href="order_master.php"> Manage Appointments</a>
                        <!--a class="collapse-item" href="manage_appointments.php">Add Appointment</a-->
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFourteen"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-check"></i>
                    <span>Verification</span>
                </a>
                <div id="collapseFourteen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--h6 class="collapse-header">Custom Components:</h6-->
                        <a class="collapse-item" href="verification.php"> Manage Verification</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw">&#xf06a;</i>
                    <span>Violators</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--h6 class="collapse-header">Custom Components:</h6-->
                        <a class="collapse-item" href="violators.php"> Manage Violators</a>
                        <a class="collapse-item" href="manage_violator.php">Add Violator</a>
                    </div>
                </div>
            </li>

            <!--li class="nav-item">
                <a class="nav-link collapsed" href="order_master.php"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-inventory">&#xf07a;</i>
                    <span>Orders & Transactions</span>
                </a>
            </li-->

            <!--li class="nav-item">
                <a class="nav-link collapsed" href="sales.php"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-dollar">&#xf158;</i>
                    <span>Sales</span>
                </a>
            </li-->

            <!--li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="sales_by_date.php">Sales by Date</a>
                    </div>
                </div>
            </li-->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--h6 class="collapse-header">Custom Components:</h6-->
                        <a class="collapse-item" href="users.php">Manage Users</a>
                        <a class="collapse-item" href="manage_user.php">Add User</a>
                    </div>
                </div>
            </li>

            <!--li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwelve"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseTwelve" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="sales_by_date.php">Request for Indigency</a>
                    </div>
                </div>
            </li-->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTen"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseTen" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="admin.php">Manage Admin</a>
                        <a class="collapse-item" href="manage_admin.php">Add Admin</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="contact_us.php"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Messages</span>
                </a>
            </li>


            <!--li class="nav-item">
                <a class="nav-link collapsed" href="contact_us.php"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Contacts</span>
                </a>
            </li-->

            <!--li class="nav-item">
                <a class="nav-link collapsed" href="#"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw">&#xf249;</i>
                    <span>Reports</span>
                </a>
            </li-->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search >
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                    <div class="header-date pull-left" style="margin-top:25px; margin-right:620px;">
        <strong><?php echo date("F j, Y"), '&nbsp;|&nbsp;', date('l');?></strong>
      </div>
      
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                            

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                                
                                                $sql= "Select * from contact_us order by id desc";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                <i class="fas fa-envelope fa-fw" style="font-size:22px;"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter" style="height:20px; margin-right:5px;"><?php echo $rowcount;?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown" style="max-height:275px; overflow-x:hidden; overflow-y:auto;">
                                <h6 class="dropdown-header">
                                    Messages
                                </h6>
                                <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($result)){?>
                                <a class="dropdown-item d-flex align-items-center" href="contact_us.php">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile.svg"
                                            alt="...">
                                        <!--div class="status-indicator bg-success"></div-->
                                    </div>
                                    
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?php echo $row['comment']?></div>
                                        <div class="small text-gray-500"><?php echo $row['name']?> · <?php echo $row['added_on']?></div>
                                     </div>
                                    <?php }?>
                                <a class="dropdown-item text-center small text-gray-500" href="contact_us.php">Read More Messages</a>
                            </div>
                        </li>
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600" style="font-size:18px;"><?php echo $_SESSION['ADMIN_USERNAME']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile_1.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div-->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

               