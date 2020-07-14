<?php
include("connection.php");

$adminusername = mysqli_real_escape_string($conn, $_POST['adminusername']);
$adminPassword = mysqli_real_escape_string($conn, $_POST['adminPassword']);

$sql = "SELECT * FROM administrator  WHERE adminusername = '".$adminusername."' AND adminPassword = '".$adminPassword."' ";
echo $sql;

$qry = mysqli_query($conn, $sql);
$row = mysqli_num_rows($qry);

if($row > 0)
{
    $r = mysqli_fetch_assoc($qry);
    session_start();

    
    $_SESSION['administratorID'] = $r['administratorID'];

    echo "<script language = 'javascript'> alert('You have logged In.'); window.location = 'index.php';</script>";
    
     header("location:dashboard.php");

}
else
{
    echo "<script language = 'javascript'> alert('USER DOES NOT EXIST.'); window.location = 'index.php';</script>";
}
?>