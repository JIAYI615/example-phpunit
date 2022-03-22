<?php 

include '../php/dbConn.php'; 

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Username = $_POST['Username'];
$Address = $_POST['Address'];
$PhoneNumber = $_POST['PhoneNumber'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
if($FirstName == "" || $LastName == "" || $Username ==  "" || $Email == "" || $Password == "" || $Address == "" || $PhoneNumber == ""){   
    header("location:../php/signupForm.php");
    //echo "<script type='text/javascript'>alert('please fill all the blanks');</script>";
}else{
    $check="select * from Users where Email = '$Email'";
    $CheckResult=mysqli_query($db, $check);
    if ($data = mysqli_fetch_array($CheckResult)){
    echo "<script type='text/javascript'>alert('This email is used!');</script>";
    }else{
        $sql = "insert into Users(Email,Password,Firstname,Username,Lastname,Address,PhoneNumber ) 
        values ('$Email','$Password','$FirstName','$Username','$LastName','$Address','$PhoneNumber')";
        if(mysqli_query($db,$sql)){
        echo "<script type='text/javascript'>alert('Successfully registered!');</script>";
        header("location:../php/Homepage.php");
        }else{
        echo "<script type='text/javascript'>alert('fail to sign up!');</script>";
        }
    }
}

?>