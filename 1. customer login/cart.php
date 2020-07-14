<?php
include("connection.php");
session_start();

$custID=$_SESSION['custID'];
$administratorID = $_POST['administratorID'];

//1- You can also use $stamp = strtotime ("now"); But I think date("Ymdhis") is easier to understand.
$stamp = date("Ymdhis");
$ip = $_SERVER['REMOTE_ADDR'];
$orderid = "$stamp-$ip";
$orderid = str_replace(".", "", "$orderid");
$orderID= $orderid;

foreach ($_POST['orderDate'] as $orderDate){
  $sql="INSERT INTO orders (orderID,orderDate,custID,administratorID) VALUES ('".$orderID."','".$orderDate."','".$custID."','".$administratorID."')";
  mysqli_query($conn, $sql);
}

$order = array_combine($_POST['productID'], $_POST['itemqty']);

foreach ($order as $productID => $orderQty){
  $sql="INSERT INTO orderdetail (orderID,orderQty,productID) VALUES ('".$orderID."','".$orderQty."','".$productID."')";
  mysqli_query($conn, $sql);
}

//echo "<script language='javascript'>alert('You have confirmed your order...');window.location='orderCart.php'</script>";
foreach ($order as $productID => $orderQty){
//the subject
$sub = "You have an order!";
//the message

$msg .= " Order ID: $orderID. 
          Customer ID: $custID.  
          Product ID: $productID.  
          Order Quantity: $orderQty 
          Administrator ID: $administratorID";
//recipient email here
$rec = "pagami.zonda26@gmail.com";
//send email
mail($rec,$sub,$msg);
}
echo "<script language='javascript'>alert('You have confirmed your order!');window.location='dashboard.php';</script>";


  

?>