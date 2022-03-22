<?php 
include '../php/header.php'; 
include '../php/dbConn.php'; 
$order_id=$_GET['Order_id'];

$records = mysqli_query($db,"delete from soen341.Order_item where OrderNum = '$order_id'");
$records2 = mysqli_query($db,"delete from soen341.Orders where orderNum = '$order_id'");

if($records){

}else{
    echo "<script type='text/javascript'>alert('delete order items fail');</script>";
}

if($records2){

}else{
    echo "<script type='text/javascript'>alert('delete order items fail');</script>";
}
header("location:../php/OrderList.php");
?>