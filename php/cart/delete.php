<?php
include '/Applications/XAMPP/xamppfiles/htdocs/php/dbConn.php'; 
session_start();
$Id=$_GET['id'];
unset($_SESSION['shops'][$Id]);
echo "<script>location='../p4_shopCart.php'</script>";
?>