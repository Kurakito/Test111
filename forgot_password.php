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
<link rel="stylesheet" type="text/css" href="css/forgot.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<script src="js/script.js"></script>
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
        <form class="" method="post" id="form_login">
            <br/>
            <h1 style="font-family: sans-serif; font-size: 22px;"> Forgot Password </h1>
            <br/>
            <div>
            <input style="text-transform:none;" type="email" placeholder="Enter Your Email" id="email" name="email">
            </div>
                    <div class="message" id="email_message"></div>
            <button type="button" class="submit" name="btn-login" onclick="forgot_password()" id="btn_submit"> Submit </button>
        <br/>
           </form>    
        </main>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    function forgot_password(){
        const message = document.querySelector('.message');
        var email = jQuery('#email').val();

        if(email == ""){
            message.classList.add('field_error');
            message.classList.remove('field_submitted');
            jQuery('#email_message').html('Please Enter Email');
        }
        else{
            message.classList.remove('field_error');
            message.classList.remove('field_submitted');
            jQuery('#email_message').html('');
            jQuery('#btn_submit').html('Please Wait...');
            jQuery('#btn_submit').attr('disabled', true);

            jQuery.ajax({
                url:'forgot_password_submit.php',
                type:'post',
                data: 'email='+email,

                success: function(result){
                    if(result == "Email Address not registered with us") {
                        message.classList.add('field_error');
                        message.classList.remove('field_submitted');

                        jQuery('#email_message').html(result);
                        jQuery('#btn_submit').html('Submit');
                        jQuery('#btn_submit').attr('disabled', false);
                    }
                    else {
                        message.classList.add('field_submitted');
                        message.classList.remove('field_error');

                        jQuery('#email_message').html(result);
                        jQuery('#btn_submit').html('Submit');
                        jQuery('#btn_submit').attr('disabled', false);
                    }
                }
            });
        }
    }
</script>