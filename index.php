<?php require('header.php');?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/contact.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css?v=<?php echo time(); ?>">
<!--home section-->
<section class="home" id="home">
    <div class="content">
    <h2 style="font-size:28px; color:#7cd657; margin-left:10px;">Barangay Incident Record<br>Tracking System</h2>
         <p style="text-transform:none; color: #ffffff">Computer club and organization that manages and operate at MIS or Management Information System. It handles and manages operations such as enrollment, admission, and evaluation of grades in CSD.</p>
             <a href="#about" class="btn-home">See more</a>
    </div>
</section><br><br>
<!--home section ends-->

<!--about section starts-->
<section class="about" id="about">
<h1 class="heading"><span>About Us</span> <!--us--></h1>
<div class="row">
    <div class="image">
        <img src="img/brgyImage.jpg" height="350px" width="100dp" class="center" alt="">
    </div>
    <div class="content" style="background:#2d2d2d;"><!-- need to copy -->
        <h3>INCIDENT RECORD TRACKING</h3>
        <br/><h2 style="text-align:center; color:#23c0d1; font-size:18px; margin-top: 10px;">Vision</h2>
        <p style="text-align:center;">To create the most conducive environment for quality academic and research oriented undergraduate and postgraduate education in computer technology  prepare the students for a globalized technological society orient them towards serving the society.</p>
        <h2 style="text-align:center; color:#23c0d1; font-size:18px;">Mission</h2>
        <p><span style="color:#23c0d1; font-size:1.5rem;">&#8226;</span>&nbsp;To impart high quality professional training at the postgraduate and undergraduate level with an emphasis on basic principles of computer technology.<br/>
        <span style="color:#23c0d1; font-size:1.5rem;">&#8226;</span>&nbsp;To establish nationally and internationally recognized research centers nd expose the students to broad experience.<br/>
        <span style="color:#23c0d1; font-size:1.5rem;">&#8226;</span>&nbsp;To impart moral and ethical values, and interpersonal skills to the students.</p>
        <p style="text-align:center;">To empower the students with the required skills to solve the complex technological problems of modern society and also provide them with a fraamework for promoting colaborative and multidisciplinary activities.</p>
            <!--a href="#product" class="btn">Learn More</a-->
    </div>
</div>
</section><br>
<!--about section ends-->


<!--Product Slider -->
<section class="product" id="product"> 
<h1 class="heading" style="margin-top:-10px; margin-left:20px;"><span>SERVICES</span></h1>
<div class="product-container box-container">
<?php
        $get_product=get_product($con, 5, '','yes','','');
        foreach($get_product as $list){
        ?>
        <div class="box">
        <a href="product.php?id=<?php echo $list['id']?>">
            <i class="far fa-file-alt" id="docu"></i>
            <h3><?php echo $list['name']?></h3>
            <h3 id="short_description"><?php echo $list['short_desc']?></h3>
            <a href="product.php?id=<?php echo $list['id']?>" class="btn" style="margin-bottom:15px;">See More</a>
            </div>
        <?php } ?>
            </div>
</div><br><br>
</section>


<!--Contact starts-->
<section class="contact" id="contact">
<?php
require('contact.php');
?>
</section>
<!--Contact ends-->

<!--footer starts-->
<?php require('footer.php');?>
<script src="js/script.js"></script>
</body>
</html>