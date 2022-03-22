<?php 
include '../php/header.php'; 
//session_start();
include '../php/dbConn.php'; 
?>
    <!--deals-->
    <div class="deals">
        <div class="deals-header">
            <h2 class="title">Top Ratings</h2>
            <a href="../php/p2_vegetablePage.php">
                <h4>Shop More <i>&#x2192</i></h4>
            </a>
        </div>
<?php

$records = mysqli_query($db,"select * from soen341.product_table");
$i=0;
echo "<table><tr>";
while($data = mysqli_fetch_array($records))
{
    if($i %3 ==0){
    $imageN=$data["images"];
    echo"</tr><tr><td style='text-align: center;'>";

    ?>
    <a href="detail.php?detail_id=<?php echo $data['product_id']?>">
    
    <img src='../images/<?php echo $imageN ?>' width='300'>
  
    </a>
    <?php
    echo "<td>";
    echo $data['name'];
 //   echo "</td>"; 
    echo "<br>";
    echo " $";
    echo $data['price']; 
    echo "</td>";
    echo"</td>";
    }else{
    $imageN=$data["images"];
    echo"<td style='text-align: center;'>";
    ?>
    <a href="detail.php?detail_id=<?php echo $data['product_id']?>">
    
    <img src='../images/<?php echo $imageN ?>' width='300'>
  
    </a>
    <?php
    echo "<td>";
    echo $data['name'];
 //   echo "</td>"; 
    echo "<br>";
    echo " $";
    echo $data['price']; 
    echo "</td>";
    echo"</td>";
    }
    $i++;
}
echo '</table>';

?>
      
        
           
           
    </div>

    <!--categories-->
    <div class="categories">
        <div class="categories-header">
            <h2 class="title">Shop by category</h2>
            <a href="../php/p2_vegetablePage.php">
                <h4>Show All <i>&#x2192</i></h4>
            </a>
        </div>
        <div class="row">
            <div class="categories-row">
                <a href="../php/p2_vegetablePage.php">
                    <img src="../images/cat-vegetable.jpg" alt="#">
                    <h4>Vegetables</h4>
                </a>
            </div>
            <div class="categories-row">
                <a href="../php/p2_fruitsPage.php">
                    <img src="../images/cat-fruits.jpg" alt="#">
                    <h4>Fruits</h4>
                </a>
            </div>
            <div class="categories-row">
                <a href="../php/p2_meatPage.php">
                    <img src="../images/cat-viande-volaille-257.jpg" alt="#">
                    <h4>Meat</h4>
                </a>
            </div>
            <div class="categories-row">
                <a href="../php/p2_milkAndBeverage.php">
                    <img src="../images/cat-boissons-257.jpg" alt="#">
                    <h4>Beverages</h4>
                </a>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php include '../php/footer.php'; ?>
</body>

</html>