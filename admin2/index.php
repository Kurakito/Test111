<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
    $username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con,$_POST['password']);
    //$password=md5($password);
    $sql="Select * from admin_users where username='$username' and password='$password'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_USERNAME']=$username;
        header('location:dashboard.php');
        die();
    }else{
        $msg="Incorrect Username or Password, Please try again";
    }
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
    <link rel="shortcut icon" type="logo/png" href="../img/aces_white.png">

    <title>Log in Page</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
<br><br><br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background:#2d2d2d;">
                                <img src="img/logo.png" width="450px" height="400px" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h2 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <br>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username" style="font-size:16px;" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Enter Password" style="font-size:16px;" required>
                                        </div>
                                        <!--div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div-->
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block" style="font-size:16px;">
                                            Sign in
                                        </button><br>
                                        <div class="position-absolute" style="color:red; font-size:16px;"><?php echo $msg?></div>
                                    </form>
                                    <hr>
                                    <!--div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div-->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>