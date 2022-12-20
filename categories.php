<?php 
require('header.php');
	$cat_id=mysqli_real_escape_string($con,$_GET['id']);
	if($cat_id>0){
		$get_product=get_product($con,'',$cat_id);
	}
    else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}	
    
    $cat_id=mysqli_real_escape_string($con, $_GET['id']);

    
$sub_categories='';
if(isset($_GET['sub_categories'])){
	$sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}
if($cat_id>0 && ($sub_categories!='' && $sub_categories>0)){
	$get_product=get_product($con,'',$cat_id,'','','',$sub_categories);
}else{
	?>
	<script>
	window.location.href='index.php#product';
	</script>
	<?php
}										
?>
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <title><?php echo $meta_title?></title>
        <div class = "products">
            <div class = "container"><br><br><br><br><br><br>
            
        
                <?php if(count($get_product)>0){?>
                    <h1 class = "lg-title"><a href="categories.php?id=<?php echo $get_product['0']['categories_id']?>"><?php echo $get_product['0']['categories']?></a></h1>
                <div class = "product-items">
                    
        <?php
        foreach($get_product as $list){?>

        <div class="box">
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
        <div style="color:#000;">
                <?php } else{
                    echo "<p>Data not found</p>";
                }?>
            </div>
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
