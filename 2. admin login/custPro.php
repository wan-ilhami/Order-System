<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    
    <link rel="stylesheet" href="styledash.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>



  <body>
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
                    <h4>Your ID: <?php echo $administratorID=$_SESSION['administratorID']; ?></h4> 
                  </center>
                  <a href="orderAdmin.php"><i class="fas fa-desktop"></i><span>Home</span></a>
                  <a href="custPro.php"><i class="fas fa-cogs"></i><span>Order</span></a>
                  <a href="product.php"><i class="fas fa-table"></i><span>Account</span></a>
                  
                  
                </div>
     </div>
    <!--########################################################################################################## -->


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

                $query = "SELECT * FROM customer";
                $query_run = mysqli_query($conn, $query);
            ?>
                <br>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <h4></h4>
                            <th scope="col"> Customer ID</th>
                            <th scope="col"> Customer Username</th>
                            <th scope="col"> Customer Name</th>
                            <th scope="col"> Customer Address </th>
                            <th scope="col"> Customer Phone Number</th>
                            <th scope="col"> Customer Email</th>
                            
                            
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody align="center">
                        <tr>
                            <td> <?php echo $row['custID']; ?> </td>                            
                            <td> <?php echo $row['username']; ?> </td>                             
                            <td> <?php echo $row['custName']; ?> </td>                       
                            <td> <?php echo $row['custAddress']; ?> </td>
                            <td> <?php echo $row['phoneNo']; ?> </td>
                            <td> <?php echo $row['email']; ?> </td>                            
                         
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



</body>
</html>