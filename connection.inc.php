<?php
session_start();
$con= new MySQLi('localhost','root','','ecom');

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Test/');
define('SITE_PATH','http://127.0.0.1/Test/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/media/product/');
?>
