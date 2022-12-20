<?php
require('connection.inc.php');
require('functions.inc.php');
$name=get_safe_value($con,$_POST['name']);
$comment=get_safe_value($con,$_POST['message']);
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into contact_us(name,comment,added_on) values('$name','$comment','$added_on')");
echo "Thank you, Your message has been sent.";
?>