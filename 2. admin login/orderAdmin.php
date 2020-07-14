<?php
include("connection.php");
session_start();
$administratorID=$_SESSION['administratorID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="styledash.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title> </title>
   
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    
</head>
<body>

    


<!-- ####################################################################################################################### -->

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
<!-- #################################################################################################### -->


<div class="container" align="center" style="width: 1000px;height: 520px;top: 50%;left: 60%;position: absolute ;transform: translate(-50%,-50%);box-sizing: border-box;>
    <div class="jumbotron">
        <div class="card">
            <h2> All order Customer </h2>
        </div>    
        

        <div class="card">
            <div class="card-body">

            <?php
                include("connection.php");

                $query = "SELECT a.orderID,a.orderDate,s.administratorID,s.adminname,c.custID,c.custName FROM orders a JOIN administrator s ON s.administratorID = a.administratorID JOIN customer c ON c.custID = a.custID ";
                $query_run = mysqli_query($conn, $query);
            ?>
            
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> Order ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Administrator ID</th>
                            <th scope="col">Administrator Name</th>
                            <th scope="col"> Customer ID </th>
                            <th scope="col"> Customer Name </th>
                            
                            <th scope="col"> EDIT </th>
                            
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['orderID']; ?> </td>                            
                            <td> <?php echo $row['orderDate']; ?> </td>                            
                            <td> <?php echo $row['administratorID']; ?> </td>
                            <td> <?php echo $row['adminname']; ?> </td>                             
                            <td> <?php echo $row['custID']; ?> </td>
                            <td> <?php echo $row['custName']; ?> </td>                            
                         <form>                            
                            <td> 
                                <button type="button" class="btn btn-success editbtn"> EDIT </button>
                            </td> 
                        </form>    
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
        </>


    </div>
</div>


<!-- #################################################################################################### -->
<!-- ####################################################################################################################### -->

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Administrator In-Charge </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="updatecode.php" method="POST">

            <div class="modal-body">

                <input type="hidden" name="orderID[]" id="orderID" value="<?php  $_SESSION['orderID'];?> ">  
                <div class="form-group">
                    
                    <h3>Select Administrator In-Charge: </h3>
                    <select name="administratorID" id="administratorID" >
                    <option value="1">root</option>
                    <option value="2">wan</option>
                    </select>

               
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"> </script>

<script>

$(document).ready(function() {

    $('#datatableid').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Your Data",
        }
    });

});

</script>






<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#orderID').val(data[0]);
            $('#administratorID').val(data[1]);
            
           
    });
});

</script>


</body>
</html>

