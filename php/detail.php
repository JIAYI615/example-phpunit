<?php 
include '../php/header.php'; 
//session_start();
include '../php/dbConn.php'; 
$id=$_GET['detail_id'];
$Dsql="select * from product_table where product_id = '$id'";
$Dresult=mysqli_query($db,$Dsql);

while($data = mysqli_fetch_array($Dresult))
{
  $imageN=$data["images"];
?>
  
  <div class="wholeBox" style="text-align: center;">
        
		<div class="description" >
            <div >
            <?php echo "<img src='../images/$imageN' width='500px'>"; ?>
            </div>
            <div class="information">
                <h2 name="p3applename"><?php echo $data['name']; ?></h2>

                <h4 class='priceEachap' name="p3applepriceunit">Price: <?php echo $data['price']; ?></h4>
                
            </div>
            <div>
                
                <p id="description1"><?php echo $data['description']; ?><br></p>
            </div>

        </div>
		
        
        <div class="item-quantity">
        <form action="../php/cart/insert.php?id=<?php echo $id?>" method="post">
                <label for="quantity">Quantity: </label>
                <input class="quantityProductap" type="number" name="Quantity" value="1" min="1">
                <button class="rightButton" type="submit" value="Submit" >Add to Shop Cart</button>
        </form>
            <br><br><br>
        </div>
        
    </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
<?php
}
/*
style='text-align: center;'

<tr>
/   <td span class="p9c2"><?php echo "<img src='../images/$imageN' width='500px'>"; ?> <br></td>
    <td style ="text-align= center;"  span class="p9c3">Name: <?php echo $data['name']; ?><br></td> 
    <td span class="p9c4">Price: <?php echo $data['price']; ?><br></td>
    <td span class="p9c5">Product description: <?php echo $data['description']; ?><br></td>	
</tr>	
*/



/*
<div class="cart-row">
                    <div class="cart-item cart-column">
                        <br>
                        <img class="cart-item-image" src="../images/<?php echo $shop['images']; ?>" width="100" height="100">
                        <span name="abb" class="cart-item-title"><?php echo $shop['name']; ?></span>
                    </div>
                    <span class="cart-price cart-column">$<?php echo $shop['price']; ?></span>
                    <div class="cart-quantity cart-column">
                            <a href="cut.php?id=<?php echo $shop['product_id']?>">-</a>
                            <div class="product-quantity"><?php echo $shop['ShopQ']; ?></div>
                            <a href="add.php?id=<?php echo $shop['product_id']?>" class='cartNum'>+</a>
                            <a href="delete.php?id=<?php echo $shop['product_id']?>" class='cartDel'>delete</a>
                    </div>



*/





?>


<?php include '../php/footer.php'; ?>
</body>

</html>