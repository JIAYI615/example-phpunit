<?php
include '/Applications/XAMPP/xamppfiles/htdocs/php/dbConn.php'; 
session_start();
$_SESSION['shops']=array();
echo "<script>location='../p4_shopCart.php'</script>";
?>