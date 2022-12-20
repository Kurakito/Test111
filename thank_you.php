<?php 
require('header.php'); ?>


<title><?php echo $meta_title?></title>
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>

<div class="hero">
        <div class="row">
            <div class="col">
                <div class="order-message">
                    <p style="color:black; margin-top:120px; margin-left: 20px;font-size:16px;">Thank you! Your order has been placed successully.</p>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        var timer = setTimeout(function() {
            window.location.href="my_order.php"
        }, 1000);
    </script>
</body>
</html>
