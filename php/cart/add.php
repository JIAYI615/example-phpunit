<?php
session_start();
$id=$_GET['id'];
$_SESSION['shops'][$id]['ShopQ']++;
if($_SESSION['shops'][$id]['ShopQ']>$_SESSION['shops'][$id]['quantity']){
    $_SESSION['shops'][$id]['ShopQ']=$_SESSION['shops'][$id]['quantity'];
}
echo "<script>location='../p4_shopCart.php'</script>";
?>