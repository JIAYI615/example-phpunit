<?php
include '/Applications/XAMPP/xamppfiles/htdocs/php/dbConn.php'; 
session_start();
$quantity=$_POST['Quantity'];
$Id=$_GET['id'];
$sql= "select* from product_table where product_id = {$Id}";
$rst=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($rst);

$_SESSION['shops'][$Id]=$row;
$_SESSION['shops'][$Id]['ShopQ']=$quantity;
if($_SESSION['shops'][$Id]['ShopQ']>$_SESSION['shops'][$Id]['quantity']){
    $_SESSION['shops'][$Id]['ShopQ']=$_SESSION['shops'][$Id]['quantity'];
}
echo "<script>location='../p4_shopCart.php'</script>";

/*echo '<pre>';
print_r($_SESSION);
echo "$Id";
echo '</pre>';
*/
?>