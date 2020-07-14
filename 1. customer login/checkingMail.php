<?php
//the subject
$sub = "Hook up services for you only baby";
//the message
$msg = "0103923664-call me baby";
//recipient email here
$rec = "pagami.zonda26@gmail.com";
//send email
mail($rec,$sub,$msg);
echo "<script language='javascript'>alert('check Your Email');window.location='dashboard.php';</script>";
?>