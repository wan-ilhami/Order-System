<?php

error_reporting(0);
//connection to database
  session_start();
  $dbuser = "root";
  $dbpass = "";
  $dbhost = "localhost";
  $dbname = "nishkartel";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(isset($_POST["add_to_cart"]))
    {
      if(isset($_SESSION["shopping_cart"]))
      {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["productID"], $item_array_id))
        {
          $count = count($_SESSION["shopping_cart"]);
    //get all item detail
            $item_array = array(
                      'item_id'       =>   $_GET["productID"],
                      'product_img'   =>   $_POST["hidden_image"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_quantity' =>   $_POST["quantity"]

            );
            array_push($_SESSION['shopping_cart'], $item_array);
        }
        else
        {
          //product added then this block
          echo '<script>alert("Item already added ");</script>';
          echo '<script>window.location = "orderCart.php";</script>';
        }
      }
      else
      {
        //cart is empty excute this block
         $item_array = array(
                      'item_id'       =>   $_GET["productID"],
                      'product_img'   =>   $_POST["hidden_image"],
                      'item_name'     =>   $_POST["hidden_name"],
                      'item_quantity' =>   $_POST["quantity"]

            );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
    }
//Remove item in cart
    if(isset($_GET["action"]))
    {
      if($_GET["action"] == "delete")
      {
        foreach($_SESSION["shopping_cart"] as $key => $value)
            {
              if($value["item_id"] == $_GET["productID"])
              {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Item removed");</script>';
                echo '<script>window.location="orderCart.php";</script>';
              }
            }
      }
    }



    

?>
<!--############################################################################################################################ -->


<!DOCTYPE html>
 <html>
      <head>
        
           <title>Nish Cart</title>

           <meta charset="utf-8">
          
          <link rel="stylesheet" href="styledash.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
          
        
          
           <meta charset="utf-8">
         
          

      </head>
      <body>
<!--############################################################################################################################ -->
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
<!--############################################################################################################################ -->




    <div>
    
           <br>
           <div class="container" style="width:800px; margin-left: 30%; margin-top: 5%; " >
                <h3 align="center">All Products Cart</h3><br />
                  <?php
                    $query = "SELECT * FROM products ORDER BY productID ASC";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>
                <div class="col-md-4" align="right" style="display:grid; grid-template-columns: 1fr 1fr 1fr;">
                     <form method="post" action="orderCart.php?action=add&productID=<?php echo $row["productID"];?>">

                          <div style="width:200px; border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                               <img src="image/<?php echo $row['image'];?>" class="img-responsive" style="width: 100px;" /><br />
                               <h4 class="text-info"><?php echo $row['productName'];?></h4>
                               <h4 class="text-info"><?php echo $row['productID'];?></h4>
                               <h4 class="text-warning">Availabilty: <?php echo $row['productQty'];?></h4>
                               <h4 class="text-danger">$<?php echo $row['price'];?></h4>
                               

                             <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row['productName'] ?>" />
                           <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                           <input type="hidden" name="productID" value="<?php echo $row['item_id'];?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">


                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                               
                          </div><br>
                     </form>
                </div>
                  <?php } } ?>
                <div style="clear:both"></div>
                <br />
</div>
<!--############################################################################################################################ -->

<div style="width:700px; margin-left: 30%; ">

                <div class="table-responsive">
                  <form action="cart.php" method="post">
                     <table class="table table-bordered">
                          <tr>
                              <th>product image</th>
                               <th width="40%">Item Name</th>
                               <th width="10%">Quantity</th>
                               <th width="20%">Item Code</th>
                               <th width="15%">Date</th>
                               <th width="5%">Action</th>
                          </tr>
                             <?php
                           if(!empty($_SESSION["shopping_cart"]))
                           {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $key => $value)
                           {

                             ?>

                          <tr>
                               <td><img src="image/<?php echo $value['product_img'];?>" style="width: 100px;"></td>
                                
                               <td><?php echo $value['item_name'];?></td>
                               <td><input type="text" name="itemqty[]" id="itemqty" placeholder="Enter Quantity" size="3" value="<?php echo $value['item_quantity']; ?>" /></td>
                               <td><input  type="text" name="productID[]" id="productID" value="<?php echo $value['item_id'] ?>" size="3" readonly /></td>
                               <td><input type="date" id="orderDate" name="orderDate[]"></td>
                               <td><a href="orderCart.php?action=delete&productID=<?php echo $value['item_id'];?>"><span class="btn btn-danger">Remove</span></a></td>
                               
                          </tr>

                          <?php
                        }

                        ?>

                          <tr>
                               <td colspan="2" align="left">
                               <br>
                               CONFIRM
                               </td>
                               <td colspan="3">
                                      <h5>Select Administrator In-Charge: </h5>
                                      <select name="administratorID" id="administratorID"  >
                                                <option value="1">root</option>
                                                <option value="2">wan</option>
                                      </select>
                              </td>

                               <td><input type="submit" name = "submit" id = "submit" value="Submit" class="btn btn-success"></td>

                          </tr>
                          <?php } ?>
                          

                     </table>
                     </form>
                   </div>
              </div>

          
               <br/>
 <!--############################################################################################################################ -->

      </body>
 </html>
