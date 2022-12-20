<?php require('header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#4e73df;"><a href="product.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:14px;">
                                            Documents</div>
                                            <?php
                                                $sql= "select * from product";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                            <div class="h3 mb-0 font-weight-bold text-white"><?php echo $rowcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa fa-4x text-light">&#xf07b;</i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#1cc88a;"><a href="order_master.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:14px;">
                                             Appointments</div>
                                             <?php
                                                $sql= "select * from ecom_orders";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                            <div class="h3 mb-0 font-weight-bold text-light"><?php echo $rowcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-4x text-light"></i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100 py-2" style="background:#36b9cc;"><a href="users.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:14px;">Users
                                            </div>
                                            <?php
                                                $sql= "select * from ecom_users";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h3 mb-0 mr-3 font-weight-bold text-light"><?php echo $rowcount;?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-4x text-light"></i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>

                        

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#f6c23e;"><a href="violators.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:14px;">
                                                Violators</div>
                                                <?php
                                                $sql= "select * from violators";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                            <div class="h3 mb-0 font-weight-bold text-light"><?php echo $rowcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-4x text-light">&#xf06a;</i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <! Earnings (Monthly) Card Example >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#e74a3b;"><a href="order_master.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:13px;">
                                             Total Request</div>
                                             <?php
                                                $sql= "select * from ecom_orders";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                            <div class="h3 mb-0 font-weight-bold text-light"><?php echo $rowcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-4x text-light" style="margin-right:-5px;"></i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>

                        <! Earnings (Monthly) Card Example >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#9679c9;"><a href="order_master.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:13px;">
                                             Pending Request</div>
                                             <?php
                                                $sql= "select * from ecom_orders where payment_status=1";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                            <div class="h3 mb-0 font-weight-bold text-light"><?php echo $rowcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-4x text-light" style="margin-right:-12px;">&#xf017;</i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>

                        <! Earnings (Monthly) Card Example >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#fb6f92;"><a href="verification.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:13px;">
                                             Pending Verification</div>
                                             <?php
                                                $sql= "select * from ecom_users where verify_status=1";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                            <div class="h3 mb-0 font-weight-bold text-light"><?php echo $rowcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-4x text-light" style="margin-right:-12px;">&#xf00c;</i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>


                        <!-- Earnings (Monthly) Card Example #e74a3b-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#5a5c69;"><a href="admin.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:14px;">
                                                 Admin</div>
                                                 <?php
                                                $sql= "select * from admin_users";
                                                if($result = mysqli_query($con, $sql)) {

                                                    // Return the number of rows in result set
                                                    $rowcount = mysqli_num_rows( $result );
                                                    
                                                    // Display resultprintf("Total rows in this table :  %d\n", $rowcount);
                                            }?>
                                                 
                                            <div class="h3 mb-0 font-weight-bold text-white"><?php echo $rowcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-4x text-light" style="margin-right:10px;"></i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#5a5c69;"><a href="sub_categories.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                             Transactions</div>
                                            <div class="h3 mb-0 font-weight-bold text-light">24</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-2x text-light">&#xf044;</i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div-->

                        <!-- Earnings (Monthly) Card Example >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100 py-2" style="background:#fb6f92;"><a href="product.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Inventory
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h3 mb-0 mr-3 font-weight-bold text-light">50%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-search fa-2x text-gray-300"></i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div-->

                        <!-- Pending Requests Card Example >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background:#77dd77;"><a href="users.php" style="text-decoration:none;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1" style="font-size:14px;">
                                                Users</div>
                                                
                                            <div class="h3 mb-0 font-weight-bold text-light"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-4x text-light"></i>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div-->

                    </div>


                    
                    

                        </div>
                    

                        </div> 
                          
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require('footer.php'); ?>