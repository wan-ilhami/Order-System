<?php
include("connection.php");
session_start();
$administratorID=$_SESSION['administratorID'];
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styleDashboard.css">
    <link rel="stylesheet" href="addproduct.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <link rel="stylesheet" href="styledash.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">



    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
     
    <!--########################################################################################################## -->

    <div class="addproduct" style="width: 920px;
    height: 420px;
    top: 50%;
    left: 60%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box; " >
            <form action="preupdateproduct.php" method="post">
                    
                        <h1>Add Products</h1>
                    
                        <label>Image Product</label> <br>
                        <input type="file" class="from-control" name="image" id="image"required>
                        <br><br>
                        <label>Product Code</label><br>
                        <input type="text" class="from-control" name="productID" id="productID" required>
                        <br>
                        <label>product Name</label><br>
                        <input type="text" class="from-control" name="productName" id="productName"required>
                        <br>
                        <label>Product Quantity</label><br>
                        <input type="text" class="from-control" name="productQty" id="productQty" required>
                        <br>
                        <label>Product Price</label><br>
                        <input type="text" class="from-control" name="price" id="price" required>
                    
                        
                    
                 <br><br>

                    <div class="button">
                        <input type="submit" value="Add" class="btn btn-success">
                    </div>


                </form>
        </div>
  
  </body>
</html>
