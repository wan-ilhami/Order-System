<?php
include("connection.php");

    if(isset($_POST['updatedata']))
    {   
        
        $administratorID = $_POST['administratorID'];
        //echo $administratorID;

        foreach($_POST['orderID'] as $orderID)
        {
                $qry = "UPDATE orders SET administratorID='".$administratorID."' WHERE orderID= TRIM('".$orderID."') ";
                echo $qry;
                
                $result = mysqli_query($conn, $qry);
                
                if($result)
                {
                    echo '<script> alert("Data Updated"); </script>';
                    header("Location:orderAdmin.php");
                }
                else
                {
                    echo '<script> alert("Data Not Updated"); </script>';
                    header("Location:orderAdmin.php");
                } 

        }
    }
    else
    {
        echo '<script> alert("tak masuk"); </script>';
            header("Location:orderAdmin.php");
    }
?>