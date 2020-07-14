<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styledash.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  </title>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">


    <title>Document</title>
</head>
<body>
<?php
include("connection.php");
session_start();
?>
    <div>
    <!-- #####################################################################################################-->
    <input type="checkbox" id="check">
                <!--header area start-->
                <header>
                  <label for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                  </label>
                  <div class="left_area">
                    <h3>NISH <span>CARTEL</span></h3>
                  </div>
                  <div class="right_area">
                  <a href="logout.php" class="logout_btn">Logout</a>
                    <?php
                      if(isset($_SESSION['message']))
                      {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                      }
                    ?>
                  </div>
                </header>
                <!--header area end-->
                <!--sidebar start-->
                <div class="sidebar">
                  <center>
                    <img src="profile.png" class="profile_image" alt="">
                    <h4>Your ID: <?php echo $custID=$_SESSION['custID']; ?></h4> 
                  </center>
                  <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Home</span></a>
                  <a href="orderCart.php"><i class="fa fa-shopping-cart"></i><span>Cart</span></a>
                  <a href="yourOder.php"><i class="fas fa-cogs"></i><span>Order</span></a>
                  <a href="updateProfile.php"><i class="fas fa-table"></i><span>Account</span></a>
                  
                  
                </div>
    <!-- #####################################################################################################-->
<!-- ####################################################################################################################### -->



<div class="container" align="center">
    <div class="jumbotron" style="
     width: 820px;
    height: 420px;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;">
         
        

       
            

            <?php
                include("connection.php");

                $query = "SELECT a.orderID,a.orderDate,s.adminname,c.custID,c.custName, p.productName, ord.orderQty FROM orders a JOIN administrator s ON s.administratorID = a.administratorID JOIN customer c ON c.custID = a.custID JOIN orderdetail ord ON ord.orderID = a.orderID JOIN products p ON p.productID = ord.productID";
                $query_run = mysqli_query($conn, $query);
            ?>
                <br>
                
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <h4></h4>
                            <th scope="col"> Order ID</th>
                            <th scope="col"  > Order Date</th>
                            <th scope="col"> Administrator Name</th>
                            <th scope="col"> Customer Name </th>
                            <th scope="col"> Product Name </th>
                            <th scope="col"> Quantity</th>
                            
                            
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr align="center">
                            <td> <?php echo $row['orderID']; ?> </td>                            
                            <td style= " width: 200px;"> <?php echo $row['orderDate']; ?> </td>                            
                            <td ><?php echo $row['adminname']; ?> </td>                             
                            <td > <?php echo $row['custName']; ?> </td>
                            <td> <?php echo $row['productName']; ?> </td>
                            <td> <?php echo $row['orderQty']; ?> </td>                            
                         
                        </tr>
                    </tbody>
            <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                </table>
                


                
            </div>
        


    </div>
</div>


<!-- #################################################################################################### -->
<!-- ####################################################################################################################### -->




</body>
</html>

