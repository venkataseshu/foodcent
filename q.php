<?php
session_start();
require_once("./include/membersite_configone.php");
$hotel=$_SESSION['name_user'];
$date= date('Y-m-d');

if(!$fgmembersite->CheckLogin())
{
 $fgmembersite->RedirectToURL("hotellogin.php");
    exit;
} 

$query = "SELECT * from person where hotel='$hotel' and time='$date'";
    $search_result = filterTable($query);

$cart_details = "SELECT * from cart where hotel='$hotel' and time='$date' ";
    $cart_det = filterTable($cart_details);

$orde = "SELECT count(*) as orders from person where hotel='$hotel' and time='$date' ";
    $orders = filterTable($orde);

     $query="SELECT SUM(`total`) from `person` WHERE `hotel`='$hotel' and `time`='$date' ";
$resul = filterTable($query);
$row = mysqli_fetch_row($resul);
$sum = $row[0];

if(isset($_POST['paid']))
{
    $user_id = $_POST['user_id'];
    $res_con = $_POST['res_con'];
    $qune = "UPDATE `person` SET `paid`='paid' WHERE no = '$user_id' and hotel='$hotel' and time='$date'  ";
    $editcart = filterTable($qune); 
header("Refresh:0");
}

if(isset($_POST['notpaid']))
{
    $user_id = $_POST['user_id'];
    $res_con = $_POST['res_con'];
    $qune = "UPDATE `person` SET `paid`='no' WHERE no = '$user_id' and hotel='$hotel' and time='$date'  ";
    $editcart = filterTable($qune); 
header("Refresh:0");
}

if(isset($_POST['prepared']))
{
    $car_id = $_POST['carid'];
    $qune = "UPDATE `cart` SET `sel`='y' WHERE idno = '$car_id' and hotel='$hotel' and time='$date'  ";
    $editcart = filterTable($qune); 
header("Refresh:0");
}

if(isset($_POST['notprepared']))
{
    $car_id = $_POST['carid'];
    $qune = "UPDATE `cart` SET `sel`='n' WHERE idno = '$car_id' and hotel='$hotel' and time='$date'  ";
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
<title>Food Cent</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
a
{
text-decoration:none;
}
#search,#searchone,#searchtwo:focus
{
outline:0;
}
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
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-container w3-top w3-red w3-large w3-padding" style="z-index:4">
  <button class="w3-button w3-hide-large w3-padding-0 w3-red w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right">FOOD CENT</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/seshu.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $hotel ?></strong></span><br>
<a href="change-pwdone.php" class="w3-bar-item w3-button"><i class="fa fa-key"></i></a>
      <a href="hotellogout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out "></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container w3-blue">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#customer_details" class="w3-bar-item w3-button w3-padding "><i class="fa fa-user fa-fw"></i>  Customer Details</a>
<a href="#order_details" class="w3-bar-item w3-button w3-padding "><i class="fa fa-diamond fa-fw"></i>  Order Details</a>
<a href="<?php echo $hotel."items.php" ?>" class="w3-bar-item w3-button w3-padding "><i class="fa fa-cutlery  fa-fw"></i>  Hotel Items</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> hotel Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-money w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $sum  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Amount</h4>
      </div>
    </div>

    <div class="w3-quarter">
<a href="#customer_details">
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

<span id="customer_details"></span>
<div class="w3-panel">

<div class="w3-margin-top">
<span>Search by the Name:</span>
<input type="text" id="searchone" placeholder=" search" style="width:200px;border-bottom:2px solid #f33446;"></input>
</div><br>

<h5>Customer Details</h5>
 <table class="w3-table w3-striped w3-white" id="tabletwo">
                <tr>
                <th>name</th>
                <th>phno</th>
                <th>address</th>
                <th>Order type</th>
                <th>Table no</th>
                <th>no of items</th>
                <th>total amount</th>
                <th>time</th>
                <th>paid</th>
                <th>date</th>
                <th></th>
               </tr>
             <tbody>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr id="mytableone">
<form action='' method='post'>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['phno'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['orders'];?></td>
                   <td><?php echo $row['nop'];?></td>
                    <td><?php echo $row['itno'];?></td>
                    <td><?php echo $row['total'];?></td>
                    <td><?php echo $row['timeo'];?></td>
                    <td><?php echo $row['paid'];?></td>
                    <td><?php echo $row['time'];?></td>
                    <td>

<input type="hidden" name="user_id" value="<?php echo $row['no'] ?>">
<button type="submit" name="paid" style="cursor:pointer;border:none;"><img src="img/ok-mark.svg" style="width:10px;height:20px;"></button>
<button type="submit" name="notpaid" style="cursor:pointer;border:none;"><img src="img/remove-symbol.svg" style="width:10px;height:20px;"></button>
                             </td>
</form>  
                     </tr>
                <?php endwhile;?>
</tbody>
            </table><br>
</div>

<div class="w3-margin">
<span>Search the Name:</span>
<input type="text" id="search" placeholder=" search" style="width:200px;border-bottom:2px solid #f33446;"></input>
</div>

<span id="order_details"></span>
<div class="w3-panel">
<h5>Order Item Details</h5>
 <table class="w3-table w3-striped w3-white" id="tableone">
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
 <td style="display:none;"><?php echo $row['sel'];?></td>
                    <td><?php echo $row['price'];?></td>
                   <td>
<form action='' method='post'>
<input type="hidden" name="carid" value="<?php echo $row['idno']; ?>">
<button type="submit" name="prepared" style="cursor:pointer;border:none;"><img src="img/ok-mark.svg" style="width:10px;height:20px;"></button>
<button type="submit" id="2" name="notprepared" style="cursor:pointer;border:none;"><img src="img/remove-symbol.svg" style="width:10px;height:20px;"></button>
</form>
</td>
                </tr>
                <?php endwhile;?>
</tbody>
            </table>
            </form>
</div>
<hr>
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-dark-grey">
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
</script>
<script src="js/index.js"></script>
<script src="js/main.js"></script>
<script>
$('table tr td').each(function(){
    if($(this).text() == 'paid')$(this).closest('tr').children('td,th').css('background-color','#818787  ').css('color','white');
});
$('table tr td').each(function(){
    if($(this).text() == 'y')$(this).closest('tr').children('td,th').css('background-color','#818787 ').css('color','white');
});

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
</script>
</body>
</html>