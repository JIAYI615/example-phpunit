<?php 
include '../php/header.php'; 
include '../php/dbConn.php'; 
?>
<table border="2" style="border-color:teal;margin-left:3.5%" >
  <tr span class="tabletd">
    <td>Order Number</td>
    <td>Order Time</td>
    <td>Total Price</td>
    <td></td>
    <td></td>
  </tr>

<?php

$user_id=$_SESSION["user_id"];
$records = mysqli_query($db,"select * from soen341.Orders where user_id = '$user_id'");

while($data = mysqli_fetch_array($records))
{
  $Time=date('Y-m-d',$data['time']);
?>
  <tr>
    <td span class="p9c1"><?php echo $data['orderNum']; ?></td>
    <td span class="p9c3"><?php echo $Time;?></td> 
    <td span class="p9c4"><?php echo $data['TotalCost']; ?></td>
    <td span class="p9c5"><a href="OrderDetails.php?order_id=<?php echo $data['orderNum']?>">View Details</a></td>	
    <td span class="p9c5"><a href="DeleteOrder.php?Order_id=<?php echo $data['orderNum']?>">Cancel the order</a></td>
  </tr>	
  
<?php
}
?>
</table>

    <br><br><br><br>

    <!--footer-->
    <?php include '../php/footer.php'; ?>
</body>

</html>