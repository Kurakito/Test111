<?php 
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$cat_res = mysqli_query($con, "select * from categories where status=1 order by id asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
		$cat_arr[]=$row;
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="Barangay Incident Record Tracking System";
$meta_desc="";
$meta_keyword="";
if($mypage=='product.php'){
	$product_id=get_safe_value($con, $_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id=$product_id"));
	$meta_title=$product_meta['name'];
}if($mypage=='login.php'){
	$meta_title='Login Page';
}if($mypage=='checkout.php'){
	$meta_title='Checkout Page';
}if($mypage=='cart.php'){
	$meta_title='Cart Page';
}if($mypage=='forgot_password.php'){
	$meta_title='Forgot Password';
}if($mypage=='profile.php'){
	$meta_title='User Profile';
}if($mypage=='my_order.php'){
	$meta_title='My Appointments';
}if($mypage=='categories.php'){
	$meta_title='Category Page';
}if($mypage=='search.php'){
	$meta_title='Search Items';
}if($mypage=='thank_you.php'){
	$meta_title='Thank you for Ordering';
}
?>

	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $meta_title?></title>
        <meta name="google-site-verification" content="JhzQr3MTvUGH37FB1uUe-zHc0R6QN5D1Blj2P-a_juw" />
		<meta name="description" content="<?php echo $meta_desc?>">
		<meta name="keywords" content="<?php echo $meta_keyword?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>" >
		<link rel="stylesheet" type="text/css" href="css/header.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="css/about.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="css/product.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="css/categories.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" type="text/html" href="googlee9c337785daf0e9b.html">
    	<link rel="shortcut icon" type="logo/png" href="img/logo.png">
    	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


	<body>
	<!--header starts -->
		<header class="header">
			<a href="#" class="logo">
			<img src="img/logo.png" width="90dp" height="90dp" alt="" style="margin-top:15px;">
			</a>
	
		<nav class="navbar">
			<ul style="margin-right:150px;">
			<li><a class="active" href="index.php#home">Home</a></li>
			<li><a href="index.php#about">About</a></li>
			<li class="drop-down"><a href="index.php#product">Services</a>
			<li><a href="my_order.php ">Appointment</a></li><!--Need to removed-->
			<li><a href="index.php#contact">Contact Us</a></li>
			<!--li><a href="index.php#contact">FAQs</a></li-->
			</ul>
	</nav>



	<?php
	if(isset($_SESSION['USER_LOGIN'])){
	$class="";
	}
	?>
	<nav class="navbar2" style="margin-left:1020px; position:absolute;">
			<div class="header_account">
				<?php if(isset($_SESSION['USER_LOGIN'])){ ?>
					<div class="collapse" id="navbarSupportedContent">
						<ul>
					        <li class="nav-item" id="account_btn" style="margin-top:14px;">
								<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight:bold; font-stretch: expanded;">
								Hello &nbsp;<?php echo $_SESSION['USER_NAME']?>
								</a>

							<div class="dropdown-menu" id="dropdown-menu" aria-labelledby="navbar"><br>
								<a class="dropdown-item" href="profile.php">Profile</a><br><br><br>
								<a class="dropdown-item" href="my_order.php">Appointment</a><br><br><br>
								<a class="dropdown-item" href="logout.php">Logout</a><br><br><br>
							</div>
     						</li>
												  
						</ul>
					</div>
					</nav>
				<?php
					}else{
						echo '<a href="login.php" class="mr15" STYLE="font-weight:bold; font-stretch:expanded;">Login</a>';
					}
				?>
			</div>
				</nav>
				<div class="icons">
		<div class="fas fa-search" id="search-btn"></div>


		<div class="search-form">
		<form action="search.php" method="get">
        <input type="search" name="str" id="search-box" style="width: 500px; height:50px; border-box: none; color:#000; background: transparent;" required> 
        <!--label for="search-box"  value="search" class="fas fa-search" id="menu-search" onclick="(location.href='search.html')"></label-->
		<button for="search-box"  value="search" class="fas fa-search" id="menu-search" style="margin-top:16px; color:#23c0d1;"></button>	
		</form>
    	</div>
		


		<a href="cart.php">
		<div class="fas fa-receipt" id="cart-btn">
		<span class="htc_qua"><?php echo $totalProduct?></span>
		</div></a>

		<div class="fas fa-bars" id="menu-btn"></div>
	</div>

    
</header>
				</body>
<!--header ends -->
