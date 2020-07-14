<?php
include("connection.php");

function checkCustomerUser($conn, $username)
{
    $found = false;
    $sql = "SELECT username FROM customer WHERE username = '".$username."' ";
    $qry = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($qry);

    if($row >0 )
    {
        $found = true;
    }
    return $found;
}


$username = $_POST['username'];
$email = $_POST['email'];
$password =$_POST['pass1'];

if ( checkCustomerUser($conn, $username) == true)
{
    echo "<script language='javascript'>alert('Username already exist.');window.location='register.php'</script>";
}
else
{
    $sql="INSERT INTO customer (username, email, password) VALUES ('".$username."','".$email."','".md5($password)."')";
    //echo $sql;
    mysqli_query($conn, $sql);
    echo "<script language='javascript'>alert('Registration is success.');window.location='index.php'</script>";

}
?>
