<?php
function pr($arr){
    echo '<pre>';
    print_r($arr);
}
function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str){
    if(($str!='')){
    $str=trim($str);    
    return mysqli_real_escape_string($con,$str);
    }
}
function get_product($con,$limit='',$product_id='',$is_main_product='',$is_short_desc='',$is_description=''){
	$sql="select * from product where product.status=1 ";
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	if($is_main_product!=''){
		$sql.=" and product.main_product=1 ";
	}
	if($is_short_desc!=''){
		$sql.=" and product.short_desc=$is_short_desc ";
	}
	if($is_description!=''){
		$sql.=" and product.description=$is_description ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}


function productSoldQtyByProductId($con,$pid){
	$sql="select sum(order_detail.qty) as qty from order_detail, ecom_orders where ecom_orders.id=order_detail.order_id and order_detail.product_id=$pid and ecom_orders.order_status!=3"; //and ecom_orders.order_status!=1"; //and (ecom_orders.payment_type=='payu' and payment_status='Success') or (ecom_orders.payment_type=='COD' and payment_status='');
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}

/*function productCancelledVisible($con,$pid){
	$sql="select sum(order_detail.qty) as qty from order_detail, ecom_orders where ecom_orders.id=order_detail.order_id and order_detail.product_id=$pid and ecom_orders.order_status=3"; //and ecom_orders.order_status!=1"; //and (ecom_orders.payment_type=='payu' and payment_status='Success') or (ecom_orders.payment_type=='COD' and payment_status='');
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}*/


function productQty($con,$pid){
	$sql="select qty from product where id ='$pid'";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
	return $row['qty'];
}


?>