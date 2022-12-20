<?php
require('header.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    
    <?php
}
?>
<title><?php echo $meta_title?></title>
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/home.css">



<!--home section-->
<section class="home" id="home">
    <div class="content">
        <h2 style="font-size:24px; color:#14345c;">&nbsp;&nbsp;Barangay Incident Record Tracking</h2>
        <p style="text-transform:none;">Computer club and organization that manages and operate at MIS or Management Information System. It handles and manages operations such as enrollment, admission, and evaluation of grades in CSD.</p>
             <a href="#about" class="btn">See more</a>
    </div>
</section>
<!--home section ends-->

 
 <!--Log in-->
 <div class="bg-form">      
    <div class="form-content">
		<main class="login">
            <form class="" method="post" id="form_login"><br/>
                <h1 style="font-family: sans-serif; font-size: 22px;"> Login Here </h1><br/>

            <div>
                <input type="email" placeholder="Enter Your Email" id="login_email" name="login_email" style="text-transform: none;">
            </div>
                <span class="field_error" id="login_email_error"></span>
            
            <div>
            <input type="password" placeholder="Enter Your Password" id="login_password" name="login_password">
            </div>
                    <span class="field_error" id="login_password_error"></span>
			
            
            <button type="button" class="submit" name="btn-login" onclick="user_login()" id="btn-login">Submit</button><br/><br/>
            
            <span class="forgot"><a href="forgot_password.php" style="color: #23c0d1;">Forgot Password?</a></span><br>
            
            </form>    
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/script.js"></script>