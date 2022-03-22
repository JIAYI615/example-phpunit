<?php 
include '../php/header.php'; 
include '../php/dbConn.php'; 
$order_id=$_GET['order_id'];
?>
<table border="2" style="border-color:teal;margin-left:3.5%;" >
  <tr span class="tabletd">
    <td>Image</td>
    <td>Name</td>
    <td>Quantity</td>
    <td>Total Price</td>
    <td></td>
  </tr>

<?php


$records = mysqli_query($db,"select * from soen341.Order_item where OrderNum = '$order_id'");
$records2 = mysqli_query($db,"select * from soen341.Orders where orderNum = '$order_id'");
$data2=mysqli_fetch_array($records2);
$tot=0;
$totQ=0;
while($data = mysqli_fetch_array($records))
{
  $imageN=$data["item_image"];
  $tot+=$data['item_price']*$data['item_num'];
  $totQ+=$data['item_num'];
?>
  <tr>
    <td span class="p9c2"><?php echo "<img src='../images/$imageN' width='50px'>"; ?></td>
    <td span class="p9c3"><?php echo $data['item_name']; ?></td> 
    <td span class="p9c4"><?php echo $data['item_num']; ?></td>
    <td span class="p9c5"><?php echo $data['item_price']*$data['item_num']; ?></td>	
    <td span class="p9c5"><a href="">write a comment</a></td>
  </tr>	
  
<?php
}
?>
</table>
<br><br>
<table border="2" style="border-color:teal;margin-left:3.5%;">
<tr>
    <td>Payment (dummy card number)</td>
    <td>Address</td>
    <td>Cost</td>
</tr>
<td>
 <?php echo $data2['Payment']; ?>
</td>
<td>
<?php echo $data2['ship_address']; ?>
</td>
<td> 
<div class="cart-summary">
                <table>
                    <tr>
                        <td>Total Quantity</td>
                        <td><?php echo $totQ; ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>$<?php echo round($tot, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Estimated GST</td>
                        <td>$<?php echo round($tot*0.05, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Estimated QST</td>
                        <td>$<?php echo round($tot*0.1, 2); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Estimated Total</strong></td>
                        <td><strong>$<?php echo round($tot*1.15, 2); ?></strong></td>
                    </tr>
                </table>
            </div>
</td>
<tr>

</tr>

</table>
    <br><br><br><br>

    <!--footer-->
    <?php include '../php/footer.php'; ?>
</body>

</html>