<?php include '../php/header.php'; 
include '../php/dbConn.php'; 
?>

    <!--Products-->
    <div class="deals">
        <div class="deals-header">
            <h2 class="title">Vegetables</h2>
            <a href="../php/Homepage.php">
                <h4>Go Back <i>&#x2192</i></h4>
            </a>
        </div>
<?php

$records = mysqli_query($db,"select * from soen341.product_table where category = 'Vegetables'");
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
            </div>
        </div>
    </div>


    <!--footer-->
    <?php include '../php/footer.php'; ?>
</body>

</html>