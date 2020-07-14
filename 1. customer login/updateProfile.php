<!DOCTYPE html>
<html>
<head>
    <!--css-->
    <link rel="stylesheet" href="styledash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--jss-->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     
</head>


<body>
<?php
include("connection.php");
session_start();
?>

  <!--<form name="register" method="post" action="pregister.php">
  -->
  
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
    


  <div class="row" style="
     width: 420px;
    height: 420px;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;">



    <form action="preUpdate.php" method="post">
   

      <div align="left">
        

            <div >
                <h3>Update Profile</h3>
            </div>

                <label>Customer ID&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
                <input type="text" class="from-control" name="custID" size="" value="<?php echo $_SESSION['custID']; ?>" readonly><br>
                <br>
                <label>Customer Name&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="from-control" name="custName" id="custName" required><br>
                <br>
                <label>Customer Address&emsp;&emsp;&ensp;&emsp;&nbsp;</label>
                <input type="text" class="from-control" name="addr" id="addr"required><br>
                <br>
                <label>Customer Email &emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;</label>
                <input type="text" class="from-control" name="email" id="email" required><br>
                <br>
                <label>Customer Contact Number&nbsp;</label>
                <input type="text" class="from-control" name="phone" id="phone"required><br>
                <br>
                <div >
                    <input type="submit" value="update" class="btn btn-success"><br>
                </div>

        </div>
      </form>
  </div>

    </body>
</html>
