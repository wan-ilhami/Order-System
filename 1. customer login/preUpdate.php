<?php

      include ("connection.php");
      session_start();
      $custID=$_SESSION['custID'];
      $custName = $_POST['custName'];
      $addr = $_POST['addr'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      $query = " UPDATE customer SET custName = '".$custName."', custAddress='".$addr."',phoneNo='".$phone."' where custID='".$custID."' ";
      $result = mysqli_query($conn,$query);
        if(isset($result))
        {
            echo "<script language='javascript'>alert('Registration successful.');window.location='dashboard.php';</script>";
        }
        else
        {
            echo "<script language='javascript'>alert('Registration unsuccessful.');window.location='dashboard.php';</script>";
        }
//echo "<script language ='javascript'> alert('User does not exist.');window.location='demlogin.php';</script>";
//window location tu nak gi file mana lepas dah run file ni
// for example, kalau dah register, dia akan gi dashboard, so window.location= 'dashboard.php';

?>
