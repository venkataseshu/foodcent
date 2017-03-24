<?PHP
$query = "SELECT count(*) as total from fgusers3";
    $search_result = filterTable($query);
$quer = "SELECT count(*) as hotels from hotelone";
    $search_resul = filterTable($quer);
$orde = "SELECT count(*) as orders from person";
    $orders = filterTable($orde);
$item = "SELECT count(*) as items from cart";
    $ite = filterTable($item);
$hotel_details = "SELECT * from hotelone";
    $hotel_users = filterTable($hotel_details);
$users = "SELECT * from fgusers3";
    $total_users = filterTable($users);
$order_details = "SELECT * from person";
    $orders_det = filterTable($order_details);
$cart_details = "SELECT * from cart";
    $cart_det = filterTable($cart_details);
if(isset($_POST['user_d']))
{
    $res_id = $_POST['user_id'];
    $qu = "DELETE FROM `fgusers3` WHERE id_user = '$res_id'";
    $dele = filterTable($qu); 
header("Refresh:0");
}
if(isset($_POST['res_order']))
{
    $res_id = $_POST['res_id'];
    $qu = "DELETE FROM `hotelone` WHERE id_user = '$res_id'";
    $dele = filterTable($qu); 
header("Refresh:0");
}
if(isset($_POST['delete_order']))
{
    $order_id = $_POST['order_id'];
    $qu = "DELETE FROM `person` WHERE no = '$order_id'";
    $delete = filterTable($qu); 
header("Refresh:0");
}
if(isset($_POST['deletecart']))
{
    $carid = $_POST['carid'];
    $qun = "DELETE FROM `cart` WHERE `idno` = '$carid'";
    $deletecart = filterTable($qun); 
header("Refresh:0");
}
if(isset($_POST['res_edit']))
{
    $res_id = $_POST['res_id'];
    $res_con = $_POST['res_con'];
    $qune = "UPDATE `hotelone` SET `confirmcode`='$res_con' WHERE id_user = '$res_id'  ";
    $editcart = filterTable($qune); 
header("Refresh:0");
}
if(isset($_POST['user_edit']))
{
    $user_id = $_POST['user_id'];
    $user_con = $_POST['user_con'];
    $qune = "UPDATE `fgusers3` SET `confirmcode`='$user_con' WHERE id_user = '$user_id'  ";
    $editcart = filterTable($qune); 
header("Refresh:0");
}
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "id682590_foodlovertk", "seshu", "id682590_foodlover");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<!DOCTYPE html>
<html>
<title>Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
input[type=text] {
  width:50px;
background:transparent;
border:none;
}
  table,tr,th,td
            {
                border: 1px solid white;
padding:10px;
               
            }
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
a
{
text-decoration:none;
}
#search,#searchone,#searchtwo:focus
{
outline:0;
}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-container w3-top w3-red w3-large w3-padding" style="z-index:4">
  <button class="w3-button w3-hide-large w3-padding-0 w3-red w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right">Food Cent</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/seshu.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>seshu</strong></span><br>
      <a href="#comments" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#Users" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container w3-blue">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#Users" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>  Users</a>
    <a href="#Hotels" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cutlery fa-fw"></i>  Restaraunts</a>
     <a href="#Orders" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#items" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Items</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
<a href="#Users">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php $row= mysqli_fetch_assoc($search_result); echo $row['total'];  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>users</h4>
      </div>
</a>
    </div>
    <div class="w3-quarter">
<a href="#Hotels">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-cutlery w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php $row= mysqli_fetch_assoc($search_resul); echo $row['hotels'];  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Restaraunts</h4>
      </div>
</a>
    </div>
    <div class="w3-quarter">
<a href="#Orders">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-diamond  w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php $row= mysqli_fetch_assoc($orders); echo $row['orders'];  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Orders</h4>
      </div>
</a>
    </div>
    <div class="w3-quarter">
<a href="#items">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-bullseye  w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php $row= mysqli_fetch_assoc($ite); echo $row['items'];  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Items</h4>
      </div>
    </div>
</a>
  </div>
<div class="w3-margin">
<span>Search the Name:</span>
<input type="text" id="search" placeholder=" search" style="width:200px;border-bottom:2px solid #f33446;"></input>
</div>
<div class="w3-panel" id="Users">
<h5>User Details</h5>
 <table class="w3-table w3-striped w3-white" id="tableone">
                <tr>
              
                <th>Name</th>
                <th>Email</th>
                <th>Phone NUmber</th>
                <th>Username</th>
                <th>Confirm</th>
                <th></th>
               </tr>
             <tbody>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($total_users)):?>
                <tr id="mytableone">
<form action='' method='post'>
                    
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone_number'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><input type="text" name="user_con" value="<?php echo $row['confirmcode'];?>"></td>
                    <td>

<input type="hidden" name="user_id" value="<?php echo $row['id_user'] ?>">
<button type="submit" name="user_d" style="cursor:pointer;border:none;"><img src="img/trash-can.svg" style="width:10px;height:20px;">
<input type="hidden" name="confirmcode" value="<?php echo $row['confirmcode'] ?>">
</button><button type="submit" id="2" name="user_edit" style="cursor:pointer;border:none;"><img src="img/pencil-edit-button.svg" style="width:10px;height:20px;"></button>
                             </td>
                             </form>    
                             </tr>
                                 <?php endwhile;?>
                             </tbody>
                             </table><br>
</div>
<div class="w3-margin">
<span>Search by the Restaurant Name:</span>
<input type="text" id="searchone" placeholder=" search" style="width:200px;border-bottom:2px solid #f33446;"></input>
</div>
<div class="w3-panel" id="Hotels">
<h5>Restaraunts Details</h5>
 <table class="w3-table w3-striped w3-white" id="tabletwo">
                <tr>
                <th>Hotel Name</th>
                <th>Email</th>
                <th>Phone NUmber</th>
                <th>Username</th>
                <th>Confirm</th>
                <th></th>
               </tr>
             <tbody>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($hotel_users)):?>
                <tr id="mytableone">
<form action='' method='post'>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone_number'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><input type="text" name="res_con" value="<?php echo $row['confirmcode'];?>"></td>
                    <td>

<input type="hidden" name="res_id" value="<?php echo $row['id_user'] ?>">
<button type="submit" name="res_order" style="cursor:pointer;border:none;"><img src="img/trash-can.svg" style="width:10px;height:20px;"></button><button type="submit" id="2" name="res_edit" style="cursor:pointer;border:none;"><img src="img/pencil-edit-button.svg" style="width:10px;height:20px;"></button>

</td>
 </form>               </tr>
                <?php endwhile;?>
</tbody>
            </table><br>
</div>
<div class="w3-margin">
<span>Search by the Customer Name:</span>
<input type="text" id="searchtwo" placeholder=" search" style="width:200px;border-bottom:2px solid #f33446;"></input>
</div>
<div class="w3-panel" id="Orders">
<h5>Order Details</h5>
 <table class="w3-table w3-striped w3-white" id="tablethree">
                <tr>
              
                <th>Name</th>
                <th>Phone Number</th>
                <th>address</th>
                <th>Hotel Name</th>
                <th>Order Type</th>
                <th>Total Cost</th>
                <th>Paid/NotPaid</th>
                <th></th>
               </tr>
             <tbody>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($orders_det)):?>
                <tr id="mytableone">
                  
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['phno'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['hotel'];?></td>
                    <td><?php echo $row['orders'];?></td>
                    <td><?php echo $row['total'];?></td>
                    <td><?php echo $row['paid'];?></td>
                    <td>
<form action='' method='post'>
<input type="hidden" name="order_id" value="<?php echo $row['no'] ?>">
<button type="submit" name="delete_order" style="cursor:pointer;border:none;"><img src="img/trash-can.svg" style="width:10px;height:20px;"></button><button type="submit" id="2" name="edit" style="cursor:pointer;border:none;"><img src="img/pencil-edit-button.svg" style="width:10px;height:20px;"></button>
</form>
</td>
                </tr>
                <?php endwhile;?>
</tbody>
            </table><br>
</div>
<div class="w3-margin">
<span>Search by the Name:</span>
<input type="text" id="searchthree" placeholder=" search" style="width:200px;border-bottom:2px solid #f33446;"></input>
</div>
<div class="w3-panel" id="items">
<h5>Item Details</h5>
 <table class="w3-table w3-striped w3-white" id="tablefour">
                <tr>
                
                <th>Name</th>
                <th>Hotel</th>
                <th>Table N0</th>
                <th>Item Name</th>
                <th>No of items</th>
                <th>Total Price</th>
                <th></th>
               </tr>
             <tbody>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($cart_det)):?>
                <tr id="mytableone">
              
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['hotel'];?></td>
                    <td><?php echo $row['nop'];?></td>
                    <td><?php echo $row['iname'];?></td>
                    <td><?php echo $row['count'];?></td>
                    <td><?php echo $row['price'];?></td>
                   <td>
<form action='' method='post'>
<input type="hidden" name="carid" value="<?php echo $row['idno']; ?>">
<button type="submit" name="deletecart" style="cursor:pointer;border:none;"><img src="img/trash-can.svg" style="width:10px;height:20px;"></button><button type="submit" id="2" name="edit" style="cursor:pointer;border:none;"><img src="img/pencil-edit-button.svg" style="width:10px;height:20px;"></button>
</form>
</td>
                </tr>
                <?php endwhile;?>
</tbody>
            </table>
</div>
  <div class="w3-container" id="comments">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="img/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="img/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.foodcent.com" target="_blank">foodcent</a></p>
  </footer>

  <!-- End page content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
$("#search").on("keyup", function() {
    var value = $(this).val();

    $("#tableone tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

$("#searchone").on("keyup", function() {
    var value = $(this).val();

    $("#tabletwo tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

$("#searchtwo").on("keyup", function() {
    var value = $(this).val();

    $("#tablethree tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

$("#searchthree").on("keyup", function() {
    var value = $(this).val();

    $("#tablefour tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});
</script>

</body>
</html>