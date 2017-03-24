<?PHP
session_start();
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin())
{
$v=1;  
}
else
{
$v=0;
}
$s = $_SESSION['name_of_user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
  <title>FOOD CENT</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/se.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/modernizr.js"></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>
<script src="js/pace.js"></script>
<link rel="STYLESHEET" type="text/css" href="themes/white/pace-theme-minimal.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Let's get this party started */
::-webkit-scrollbar {
    width: 5px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background:#f33446; 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: rgba(255,0,0,0.4); 
}
.parallax {
    /* The image used */
    background-image: url("hotel-1.png");

    /* Set a specific height */
    min-height: 300px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;

}
</style>
</head>
<body> 
<header>
    <div id="logo"><span class="w3-pacifico w3-large">FOOD CENT</span></div>
    <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
    <div id="cd-cart-trigger"><a class="cd-img-replace" href="#0">Cart</a></div>
  </header>
  <nav id="main-nav">
    <ul class="clearfix" style="list-style-type: none;">
      <li><a href="index.php">Home</a></li>
      <li><a href="#starters">Starters</a></li>
      <li><a href="#biryani">Biryani</a></li>
      <li><a href="#Fired Rice">Fried Rice</a></li>
      <li><a href="#Specials">Specials</a></li>
      <li><a href="#contact">Contact-us</a></li>
    </ul>
  </nav>
<div><br><br>
  <div class="parallax"></div>
</div>
<br>
<div class="w3-container"> 
<p>Select Order Type</p><br>
<button onclick="snack(),document.getElementById('btn5').style.display='block'" id="btn1" class="w3-margin-bottom w3-btn w3-round-xxlarge w3-red w3-padding w3-hover-white" data-value="orders" data-hotel="Grt">Orders</button>
<button onclick="snack(),document.getElementById('btn5').style.display='block'" id="btn2" class="w3-margin-bottom w3-btn w3-round-xxlarge w3-red w3-padding w3-hover-white" data-value="parcels">Take away</button>
<button onclick="snack(),document.getElementById('btn5').style.display='block'" id="btn3" class=" w3-margin-bottom w3-btn w3-round-xxlarge w3-red w3-padding w3-hover-white" data-value="Door Delivery">Door Delivery</button>
<button class="w3-margin-bottom w3-badge w3-round-xxlarge w3-red" onclick="document.getElementById('btn5').style.display='none'"  id="btn5" style="cursor: pointer;display:none">X</button>
<div id="seat"></div>
<br>
  <p class="noone" >Table no:</p>  <br>
  <button onclick="snack()" data-no="1" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom ">1</button>
  <button onclick="snack()" data-no="2" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">2</button>
  <button onclick="snack()" data-no="3" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">3</button>
  <button onclick="snack()" data-no="4" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">4</button>
  <button onclick="snack()" data-no="5" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">5</button>
  <button onclick="snack()" data-no="6" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">6</button>
  <button onclick="snack()" data-no="7" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">7</button>
  <button onclick="snack()" data-no="8" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">8</button>
  <button onclick="snack()" data-no="9" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">9</button>
  <button onclick="snack()" data-no="10" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">10</button>
  <button onclick="snack()" data-no="11" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">11</button>
  <button onclick="snack()" data-no="12" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">12</button>
  <button onclick="snack()" data-no="13" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">13</button>
  <button onclick="snack()" data-no="14" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">14</button>
  <button onclick="snack()" data-no="15" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">15</button>
  <button onclick="snack()" data-no="16" class="add w3-btn w3-red w3-hover-white w3-round-xxlarge w3-margin-bottom">16</button>
</div><br>
<div class="w3-container t"> <span>Select the time:</span>
<input class="w3-input" type="time" name="time" id="time"  style="width: 35%; background: transparent;">
<div class="underline" style="width: 35%;"></div><br>
<button onclick="show(),snack()" class="w3-btn w3-red w3-round-xxlarge">Select</button>
</div>
<div id="snackbar">Selected</div>
<div id="starters"></div>
<br>
<br>
<div  class="w3-container">
<h1> Starters</h1>
</div>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="911.jpg" style="width:100%">
      <div class="w3-container">
        <h5>chicken lollipop rs.75/- <a onclick="snack()" href="#" data-name="Chicken lollipop" data-price="75.00" class="add-to-cart w3-badge w3-red w3-right" style="text-decoration:none;">+</a></h5>
<div class="w3-red" style="height:3px;"></div>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="0002.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Chicken Skewers rs.100/-<a onclick="snack()" href="#" data-name="Chicken Skewers" data-price="100.00" class="add-to-cart w3-badge w3-red w3-right" style="text-decoration:none;">+</a></h5>
<div class="w3-red" style="height:3px;"></div>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="974.jpg" style="width:100%">
      <div class="w3-container">
        <h5>chilli chicken rs.75/- <a onclick="snack()" href="#" data-name="Chilli Chicken" data-price="75.00" class="add-to-cart w3-badge w3-red w3-right" style="text-decoration:none;">+</a></h5>
<div class="w3-red" style="height:3px;"></div>
      </div>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="911.jpg" style="width:100%">
      <div class="w3-container">
        <h5>chicken lollipop rs.75/- <a onclick="snack()" href="#" data-name="Chicken lollipop" data-price="75.00" class="add-to-cart w3-badge w3-red w3-right" style="text-decoration:none;">+</a></h5>
<div class="w3-red" style="height:3px;"></div>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="0002.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Chicken Skewers rs.100/-<a onclick="snack()" href="#" data-name="Chicken Skewers" data-price="100.00" class="add-to-cart w3-badge w3-red w3-right" style="text-decoration:none;">+</a></h5>
<div class="w3-red" style="height:3px;"></div>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="974.jpg" style="width:100%">
      <div class="w3-container">
        <h5>chilli chicken rs.75/- <a onclick="snack()" href="#" data-name="Chilli Chicken" data-price="75.00" class="add-to-cart w3-badge w3-red w3-right" style="text-decoration:none;">+</a></h5>
<div class="w3-red" style="height:3px;"></div>
      </div>
    </div>
  </div>
</div><br>


<div id="biryani"></div>
<br>
<div  class="w3-container">
<h1> Biryani</h1>
</div>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="4.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Chicken Biryani rs.150/- <a onclick="snack()" href="#" data-name="Chicken Biryani" data-price="150.00" class="add-to-cart w3-badge w3-red w3-right" style="text-decoration:none;">+</a></h5>
<div class="w3-red" style="height:3px;"></div>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="113.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Egg biryani rs.120/-  <a onclick="snack()" href="#" data-name="Egg Biryani" data-price="120.00" class="w3-badge w3-red w3-right add-to-cart" style="text-decoration:none;">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="211.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Mushroom Biryani  rs.150/- <a onclick="snack()" href="#" data-name="Mushroom Biryani" data-price="150.00" class="w3-badge w3-red w3-right add-to-cart" style="text-decoration:none;">+</a></h5>
      </div>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="114.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Mutton Biryani  rs.150/- <a onclick="snack()" href="#" data-name="Mutton Biryani" data-price="150.00" class="w3-badge w3-red w3-right add-to-cart" style="text-decoration:none;">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="26.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Hyderabad Chicken Biryani rs150/- <a onclick="snack()" href="#" data-name="Hd Chicken Biryani" data-price="150.00" class="w3-badge w3-red w3-right add-to-cart" style="text-decoration:none;">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="410.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Dum Biryani rs.140/- <a onclick="snack()" href="#" data-name="Dum Biryani" data-price="140.00" class="w3-badge w3-red w3-right add-to-cart" style="text-decoration:none;">+</a></h5>
      </div>
    </div>
  </div>
</div>

<div id="Fired Rice"></div>
<br>
<div  class="w3-container">
<h1>Fried Rice</h1>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="1.jpg" style="width:100%">
      <div class="w3-container">
        <h5>5 Terre <a onclick="snack()" class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="3.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Monterosso <a onclick="snack()" class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="1.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Vernazza <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="4.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Manarola <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="4.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Corniglia <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="4.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Riomaggiore <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>
</div>

<div id="Specials"></div>
<br>
<div  class="w3-container">
<h1> Specials</h1>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="1.jpg" style="width:100%">
      <div class="w3-container">
        <h5>5 Terre <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="3.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Monterosso <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="1.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Vernazza <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card-2">
      <img src="4.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Manarola <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="4.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Corniglia <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card-2">
      <img src="4.jpg" style="width:100%">
      <div class="w3-container">
        <h5>Riomaggiore <a class="w3-badge w3-red w3-right">+</a></h5>
      </div>
    </div>
  </div>
</div><br>
<br>
  <div class="w3-container w3-red" id="contact">
    <span><h1>GRT Residency</h1></span>
    <span>vellore,</span>
    <span>9944374899</span>
  </div>
  <div class="w3-container w3-bottom-right w3-white w3-small">
 <span class="w3-text-red w3-right">
 foodcent.com @2017</span> 
 </div>
<div id="cd-shadow-layer"></div>
  <div id="cd-cart">
<div>
<div id="checkin" style="position:absolute;top:50%;left:40%;">
<form method="post" action="login.php" >
<input type="hidden" name="checking" value="grt">
<button class="w3-btn w3-red" type="submit" >Login</button>
</form>
</div>
<div id="checkinone" style="font-size:8pt;"><br>
<span style="margin-left:2%;"><img src="img/man.svg" style="width:30px;height:30px;"><span style="padding-left:20px;"><?php echo $s ?></span></span><br><br>
  <button id="clear-cart" class="w3-btn w3-red w3-right "> Clear Cart</button> <br>
  <div class="w3-container">
<p>Hotel name:<span id="test3"></span></p>
<p>Order type:<span id="test1" style="margin: 10px;"></span><span id="test2"></span></p>
<p id="po">table no:<span id="test4"></span></p>
<p id="po">Time:<span id="test456"></span></p>
</div>
    <h2>Cart</h2>
    <ul class="cd-cart-items" id="show-cart">
    </ul> <!-- cd-cart-items -->
    <div class="cd-cart-total">
      <p>Items in cart <span id="count-cart"></span></p>
    </div>
    <div class="cd-cart-total">
      <p>Total <span id="total-Cart"></span></p>
    </div> <!-- cd-cart-total -->
    <button onclick="posttwos();" class="checkout-btn" style="height:50px;font-size:12pt;cursor:pointer;">checkout</button>

<!-- checkout -->

<div class="w3-container">
     <div id="id09" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <div class="w3-container w3-red"> 
   <span onclick="document.getElementById('id09').style.display='none'" 
   class="w3-closebtn w3-padding-top">&times;</span>
   <h2>Checkout</h2>
</div>
<div>
  </div>

  <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">
  <li><a href="#" class="tablink" onclick="openCity(event, 'details')">Details</a></li>
   
   <!--<li><a href="#" class="tablink" onclick="openCity(event, 'payment')">Payment</a></li>-->
  </ul>

  <div id="details" class="w3-container city">
   <h1>Details</h1>
   <div id="result"></div>
   <div class="w3-container">
 <form>
  Name :<?php echo $s ?><br>
  Phno :<input class="w3-input" id="Phone" name="Phone" style="border-bottom: 2px solid #f33446;width:60%;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10"
 /><br>
   <span id="adds"> Address :<br><input type="text" id="address" name="addr" value="" style="border-bottom: 2px solid #f33446;width:60%"><br></span>
<p>Hotel name:<span id="test33"></span></p>
<p>Order type:<span id="test11" style="margin: 10px;"></span><span id="test22"></span></p>
<p id="po">Tabe no:<span id="test44"></span></p>
<p id="po">Time:<span id="test45"></span></p>
   <h1>Cart Items</h1>
   <ul class="cd-cart-items" id="cartdetails">
    </ul>
      <p>Items in cart :  <span id="countcart"></span></p>
      <br>
      <p>Total :  <span id="totalCart"></span></p>
           <input id="clear" class="w3-btn w3-red w3-right " type="submit" value="Submit" style="width:30%;" onclick="document.getElementById('id09').style.display='none',posts();" ><br>
</form>
<div class="w3-container">
  <div id="id010" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id010').style.display='none'" class="w3-closebtn">&times;</span>
        <p class="w3-display-topmiddle" id="last"></p>
      </div>
    </div>
  </div>
</div>

  </div>

  <!---<div id="payment" class="w3-container city">
   <h1>Payment</h1>
   <p>Total amount : <span id="totalCartlast"></span></p><br>
   <div class="w3-container w3-padding">
   <button class="w3-btn w3-right w3-white w3-border" 
   onclick="#">Done</button>
  </div>-->
  </div>
 </div>
</div>
</div>

    
   <!--- <p class="cd-go-to-cart"><a href="#0">Go to cart page</a></p> -->
  </div>
<br>
 <script src="js/shoppingcart.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script>
<script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
 <script>
 /*---------------------------------------

 shooping cart function


-----------------------------------*/
 $(document).ready(function(){
// Check browser support
$('#tims').val(new Date().toString("hh:mm tt"));
    $("#btn1").click(function(){
        $("btn5").show();
        $("#btn2,#btn3,#p,#adds").hide();
        $("#test1,#test11").html("Order");
    });
    $("#btn5").click(function(){
        $("#btn2,#btn3,#p,#btn1,#po,.add,.noone,.t,#adds").show();
    });
    $("#btn2").click(function(){
      $("btn5").show();
        $("#test1,#test22").html("Take Away");
         $("#btn1,#btn3,.add,#po,.noone,.t,#adds").hide();
    });
    $("#btn1,#btn2,#btn3").click(function(){
        $("#test3,#test33").html("grt");
    });
    $("#btn3").click(function(){
      $("btn5").show();
        $("#test1,#test22").html("Door Delivery");
         $("#btn1,.add,#btn2,#po,.noone,.t").hide();
    });
     $(".add").click(function(){
      $("#test4,#test44").html(Number($(this).attr('data-no')));
    });
});
 /*---------------------------------------

 verification


-----------------------------------*/
function posttwos()
{
   var hotel = document.getElementById('test3')
    var order = document.getElementById('test1'); 
    var nop = document.getElementById('test4');
    var time = document.getElementById('test45');
    var car = shoppingCart.cart;
if(order.innerHTML =="")
{
alert('select the order type');
}
else if(order.innerHTML =="Order" && nop.innerHTML =="" )
{
alert('select the table ');
}
else if(order.innerHTML =="Order" && time.innerHTML ==""  )
{
alert('select the  time');
}
else if(car.length==0 )
{
alert('please select atleast one item ');
}
else
{
posttwo();
}
}

function posttwo(){
 var car = shoppingCart.cart;
if(car.length <=4){
$('#id09').css('display', 'block');
}else{
alert('please choose only 4 items');
}
}
function posts(){
    var name = 'seshu'
    var Phonenumber = $('#Phone').val();
if(name == "" || Phonenumber == "" ){
alert('please fill all the details');
}else{
post();
}
}
function post()
  {
    var name =  'seshu'
    var Phonenumber = $('#Phone').val();
    var address  = $('#address').val();
    var hotel = document.getElementById('test3')
    var order = document.getElementById('test1'); 
    var nop = document.getElementById('test4');
    var time = document.getElementById('test45'); 
    var itno = shoppingCart.countCart();
    var total = shoppingCart.totalCart();
    var car = shoppingCart.cart;
if(car.length <=4){
    $.post('db.php',{postname:name,postphonenumber:Phonenumber,postaddress:address,posthotel:hotel.innerHTML,postorder:order.innerHTML,
postnop:nop.innerHTML,posttimeo:time.innerHTML,postitno:itno,posttotal:total,postcart:car},function(data){
    });
postone();
}
  }
function postone(){
    var text="";
    var text1="";
    var text2="";
var hotel = document.getElementById('test3');
   var nop = document.getElementById('test4');
    var car = shoppingCart.cart;
    var name = 'seshu' 
    if (car.length <= 4) {
    for (var i = 0; i <= car.length; i++) {
      text += car[i].name;
      text1 += car[i].count;
      text2 += car[i].price;
      $.post('a.php',{postname:name,postnop:nop.innerHTML,posthotel:hotel.innerHTML,postiname:text,postcount:text1,postprice:text2},function(data){ 
      }); 
     text="";text1="";text2="";
    }
alert("order placed sucessfully");
   } else   
  alert('please choose only four items');
  }

$(".add-to-cart").click(function(event){
event.preventDefault();
var name = $(this).attr("data-name");
var price = Number($(this).attr("data-price"));

console.log("Click add to cart :"+name+""+price);

shoppingCart.addItemToCart(name,price,1);
displayCart();
});
  $("#clear-cart,#clear").click(function(event){
shoppingCart.clearCart();
displayCart();
  });
   $("#clear-cart").click(function(event){
     var items = 0;
    $("#cd-cart-trigger").append("<div class=\"basketitems\">" + items + "</div>");
  });
function displayCart(){
var cartArray = shoppingCart.listCart();
var output="";
var outputone="";
for ( var i in cartArray){
  output += "<li>"
  +cartArray[i].name
  +" ( "+cartArray[i].count
  +" x "+cartArray[i].price
  +" )="+cartArray[i].total
  +"<br>"
   +"<button  class='w3-badge w3-red  add-item' data-name='"+cartArray[i].name+"'>+</button>"
  +"<button class='w3-badge w3-red w3-round-xxlarge subtract-item' data-name='"+cartArray[i].name+"'>-</button>"
  +"<button  class='w3-badge w3-red w3-round-xxlarge delete-item' data-name='"+cartArray[i].name+"'>X</button>"
  +"</li>";
outputone += "<li>"
  +cartArray[i].name
  +" ( "+cartArray[i].count
  +" x "+cartArray[i].price
  +" )="+cartArray[i].total
  +"</li>";
}
$("#cd-cart-trigger").ready(function(event){
   var items = shoppingCart.countCart();
$(document).ready(function() {
    $("#cd-cart-trigger").append("<div class=\"basketitems\">" + items + "</div>");
});
});
$("#show-cart").html(output);
$("#cartdetails").html(outputone);
$("#total-Cart,#totalCart,#totalCartlast").html(shoppingCart.totalCart());
$("#count-cart,#countcart").html(shoppingCart.countCart());
$(".delete-item").click(function(event){
  var name = $(this).attr("data-name");
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
});
$(".subtract-item").click(function(event){
  var name = $(this).attr("data-name");
  shoppingCart.removeItemFromCart(name);
  displayCart();
});
$(".add-item").click(function(event){
  var name = $(this).attr("data-name");
  shoppingCart.addItemToCart(name,0,1);
  displayCart();
});
}
shoppingCart.LoadCart();
displayCart();
console.log("shoppingCart :cart");
console.log(shoppingCart.cart);
console.log("Gloabl Cart:");
console.log(this.cart);
function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script>
function snack() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 500);
}
</script>
<script>
   function show()
{
var Time = $("#time").val();
$("#test45,#test456").html(Time);
    }
</script>
<script>
$(document).ready(function(){
if(localStorage.getItem("hotel-one") == 0)
{
shoppingCart.clearCart();
localStorage.setItem("hotel-one", "1");
localStorage.setItem("counto", "1");
}

var q=<?php echo $v ?>;
if(q==1)
{
$("#checkin").css("display", "block");
$("#checkinone").css("display", "none");
}
if(q==0)
{
$("#checkin").css("display", "none");
$("#checkinone").css("display", "block");
}
});
</script>
</body>
</html>