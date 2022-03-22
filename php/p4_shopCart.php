<?php include '../php/header.php'; 
 include "../php/dbConn.php";
?>


<div class="cart-container">
            <h2 class="section-header">SHOPPING CART</h2>
            <table width='100%'>
            <div class="cart-row">
                <tr>
                
                <td></td>
				<td></td>
				<td ></td>
                <td><a href="../php/Homepage.php">Continue Shopping</a></td>
                </tr>
                <tr>
                
                <td>ITEM</td>
				<td>PRICE</td>
				<td class="cart-quantity cart-column">QUANTITY</td>
                <td>ITEM TOTAL</td>
                <td></td>
                </tr>
            </div>
            <?php
            $tot=0;
            $totQ=0;
            if(!isset($_SESSION['shops'])){
                echo "the shopping cart is empty!";	
            }else{
                    foreach($_SESSION['shops'] as $shop){
                    $tot+=$shop['price']*$shop['ShopQ'];
                    $totQ+=$shop['ShopQ'];
                    $_SESSION["Total"]=$tot;
                
            ?>
            <tr>
            <div class="cart-row">
                    <td>
                    <div class="cart-item cart-column">
                        <br>
                        <img class="cart-item-image" src="../images/<?php echo $shop['images']; ?>" width="100" height="100">
                        <span name="abb" class="cart-item-title"><?php echo $shop['name']; ?></span>
                    </div>
                    </td>
                    <td>
                    <span class="cart-price cart-column">$<?php echo $shop['price']; ?></span>
                    </td>
                    <td>
                    <div class="cart-quantity cart-column">
                            <a href="../php/cart/cut.php?id=<?php echo $shop['product_id']?>">-</a>
                            <div class="product-quantity"><?php echo $shop['ShopQ']; ?></div>
                            <a href="../php/cart/add.php?id=<?php echo $shop['product_id']?>" class='cartNum'>+</a>
                    </div>
                    <td>
                    <span class="cart-price cart-column">$<?php echo $shop['price']*$shop['ShopQ']; ?></span>   
                    </td>
                    </td>
                    <td>
                    <a href="../php/cart/delete.php?id=<?php echo $shop['product_id']?>" class='cartDel'>delete</a>
                    </td>
            </div>
                </tr>        
                <?php
                }
                ?>

            <table>
                <tr>
                
                <td></td>
				<td></td>
				<td ></td>
                <td><a href="../php/cart/clear.php">Clear the Cart</a></td>
                </tr>
                
            </table>
            
            </table>
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
        <button class="btn btn-primary btn-purchase" type="button" ><a href="../php/p4_cart_checkout.php">CHECK OUT</a></button>
        
            </div>
            


        <?php
                }
        ?>


    <!--footer-->
    <?php 
    include '../php/footer.php'; 
    ?>
</body>

</html>