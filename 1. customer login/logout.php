<?php 
session_start();
session_destroy();
unset($_SESSION['custID']);
echo "<script language = 'javascript'> alert('You have logged Out.'); window.location = 'index.php';</script>";



?>