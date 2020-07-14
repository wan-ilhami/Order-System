<?php
include("connection.php");

$image=$_POST['image'];
$productID=$_POST['productID'];
$productName=$_POST['productName'];
$productQty=$_POST['productQty'];
$price=$_POST['price'];

$sql="INSERT INTO products (productID,productName,price,productQty,image) VALUES ('".$productID."' , '".$productName."' , '".$price."' , '".$productQty."' , '".$image."' )";
$result = mysqli_query($conn, $sql);
if($result)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:dashboard.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
            header("Location:dashboard.php");
        }

?>