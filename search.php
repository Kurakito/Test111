<?php 
require('header.php');
	$str=mysqli_real_escape_string($con,$_GET['str']);
	if($str!=''){
		$get_product=get_product($con,'','','',$str);
	}
    else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}										
?>
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <title><?php echo $meta_title?></title>
        <link rel="stylesheet" type="text/css" href="css/categories.css">
        <div class = "products">
            <div class = "container"><br><br><br><br><br><br><br>
            
        
                <?php if(count($get_product)>0){?>
                    <h1 class = "lg-title" style="color:#14345c; text-transform: uppercase; font-weight:bold;"><?php echo $str?></h1>
                <div class = "product-items">
                    
        <?php
        foreach($get_product as $list){?>

        <div class="box" style="flex: 0 0 auto; padding: 1rem 1rem; height: 40rem; width: 23rem; color: #000;
	        text-align: center;	background: #14345c; border-radius: 20px; margin-left:-20px;">
            <a href="product.php?id=<?php echo $list['id']?>">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt=""></a><!-- inside the img onclick="(location.href='details1.html')"-->
            <h3><?php echo $list['name']?></h3>
            <div class="price">P <?php echo $list['price']?></div>
            <a href="product.php?id=<?php echo $list['id']?>" class="btn">Add to cart</a>
        </div>

        <?php } ?>
                </div>
            </div>
        </div>
            
                <?php } else{
                    echo "<p>Data not found</p>";
                }?>
           
<style>
    p{
        margin-top:20px;
        color:black;
        font-size:20px;
        font-weight:bold;
    }
</style>

<script src="js/script.js"></script>      
</body>
</html>
