<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title></title>
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
    
  
  </body>
</html>
