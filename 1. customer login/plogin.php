<?php
include("connection.php");

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM customer WHERE username = '".$username."' AND password = '".md5($password)."' ";
echo $sql;

$qry = mysqli_query($conn, $sql);
$row = mysqli_num_rows($qry);
echo "row:";
echo $row;

if($row > 0)
{
    $r = mysqli_fetch_assoc($qry);
    session_start();
    $_SESSION['custID'] = $r['custID'];
   


    echo "<script language = 'javascript'> alert('You have logged In.'); window.location = 'dashboard.php';</script>";
}
else
{
    echo "<script language = 'javascript'> alert('USER DOES NOT EXIST.'); window.location = 'index.php'</script>";
}

// check username whether database already have same username



?>
