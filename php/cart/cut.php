<?php
session_start();
$id=$_GET['id'];
$_SESSION['shops'][$id]['ShopQ']--;
if($_SESSION['shops'][$id]['ShopQ']<1){
    unset($_SESSION['shops'][$id]);
}

echo "<script>location='../p4_shopCart.php'</script>";
?>