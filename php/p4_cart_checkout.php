<?php include '../php/header.php'; 
 include "../php/dbConn.php";
 if(!isset($_SESSION['user_id'])){
  header("location:../php/loginForm.php");
 }
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>

<body>
<div class="cart-container">
            <h2 class="section-header">Order Details</h2>
            <table width='100%'>
            <div class="cart-row">
                <tr>
                
                <td>ITEM</td>
				<td>PRICE</td>
				<td class="cart-quantity cart-column">QUANTITY</td>
                <td >ITEM TOTAL</td>
                </tr>
            </div>
            <?php
            $tot=0;
            $totQ=0;
            if(!$_SESSION['shops']){
                echo "the shopping cart is empty!";	
            }else{
                    foreach($_SESSION['shops'] as $shop){
                    $tot+=$shop['price']*$shop['ShopQ'];
                    $totQ+=$shop['ShopQ'];
                
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
                            
                            <div class="product-quantity"><?php echo $shop['ShopQ']; ?></div>
                            
                    </div>
                    <td>
                    <span >$<?php echo $shop['price']*$shop['ShopQ']; ?></span>   
                    </td>
                    </td>
            </div>
                </tr>        
                <?php
                }
                ?>

            
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
                        <td>Delivery</td>
                        <td>Free</td>
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
            <div>
                <h2 class="section-header">Payment Information </h2>
            </div>
            
            <form action="../php/cart/commit.php" method='post'>  
            <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
       
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" placeholder="Card Holder" name="LastName"/>
            <label for="ccnum">Credit card number</label>
            <input type="text" placeholder="Card Number" name="Payment"/>
            <label for="ccnum">Address</label>
            <input type="text" placeholder="Shipping Address" name="ship_address"/>
            
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Date</label>
                <input type="text" placeholder="MM/DD" name="Username"/>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" placeholder="Security number" name="Address"/>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <button style="background-color: dimgray" class="btn btn-primary btn-purchase" type="submit" >Place Order</button>
      </form>
    </div>
  </div>
  
</div>
</form>    
 </br></br></br></br>


        <?php
                }
        ?>


    <!--footer-->
    <?php 
    include '../php/footer.php'; 
    ?>
</body>

</html>