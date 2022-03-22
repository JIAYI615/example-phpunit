<?php
session_start();
include '/Applications/XAMPP/xamppfiles/htdocs/php/dbConn.php'; 
$ship_address=$_POST["ship_address"];
$Payment=$_POST["Payment"];
$user_id=$_SESSION["user_id"];
$Total=$_SESSION["Total"];
$TotalCost=round($Total*1.15, 2);
$orderNum=time().mt_rand();
$time=time();

if($ship_address=="" || $Payment=="" ||$user_id==""||$TotalCost==""||$orderNum==""||$time==""){
    echo "<script type='text/javascript'>alert('fill all the blank');</script>";
}
else{
    foreach($_SESSION['shops'] as $shop){
  	$S1=$shop['product_id'];
    $S2=$shop['name'];
    $S3=$shop['ShopQ'];
    $S4=$shop['price'];
    $S5=$shop['images'];
//    $sql1="insert into Order_item(OrderNum, user_id, item_id, item_name, item_num, item_price, item_image) 
//    values('$orderNum','$user_id','$S1', '$S2', '$S3', '$S4','$S5')";

    
    $sql1="insert into Order_item(OrderNum, user_id, item_id, item_name, item_num, item_price, item_image) 
    values('$orderNum','$user_id','{$shop['product_id']}', '{$shop['name']}', '{$shop['ShopQ']}', '{$shop['price']}','{$shop['images']}')";

	if(mysqli_query($db,$sql1)){
        
    }else{
        echo "<script type='text/javascript'>alert('insert items fail');</script>";
    }

	//reduce rhe stock
	$newQ=$shop['quantity']-$shop['ShopQ'];
	$sqlStock="update product_table set quantity='{$newQ}' where product_id={$shop['product_id']}";	
	if(mysqli_query($db, $sqlStock)){

    }else{
        echo "<script type='text/javascript'>alert('update quantity of items fail');</script>";
    }
}

    $sql2="insert into Orders(orderNum, user_id, time, TotalCost, Payment, ship_address) 
    values('$orderNum','$user_id','$time', '$TotalCost', '$Payment', '$ship_address')";
    if(mysqli_query($db,$sql2)){

    }else{
        echo "<script type='text/javascript'>alert('insert order fail');</script>";
    }
}
unset($_SESSION['shops']);
header("location:../OrderList.php");

//echo '<pre>';
//print_r($orderNum);
//echo '</pre>'
?>