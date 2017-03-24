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
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>FOOD CENT</title>
      <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/se.css">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/modernizr.js"></script>
<script src="js/pace.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
<link rel="STYLESHEET" type="text/css" href="themes/white/pace-theme-minimal.css">
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
.carousel-inner{
  width:100%;

  max-height: 350px !important;
 background-attachment: fixed;
}
.item img{
  width:1366px;
  max-height: 350px !important;
}
.bu:focus
{
outline:0;
}
</style>
</head>
<body>
<header>
    <div id="logo"><span class="w3-pacifico w3-xlarge">Food Cent</span></div>
    <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
<div id="cd-cart-trigger"><button class="bu w3-red w3-padding-8" href="#0" style="border:none;"><span style="overflow:hidden;fontsize:20px;"><img  src="img/man.svg" style="width:50px;height:30px;color:white;box-shadow:none;padding-right:10px;"></img><span></button></div>
  </header>

  <nav id="main-nav">
    <ul>
    <li><a style="color: white" href='#Restaurants'>Restaurants</a></li> 
<li><a style="color: white" href='hotellogin.php'>Hotel login</a></li>
<li><a style="color: white" href='about.php'>About Us</a></li>

    </ul>
  </nav>
<br><br>
  <div id="mycarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators 
  <ol class="carousel-indicators">
    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
    <li data-target="#mycarousel" data-slide-to="1"></li>
    <li data-target="#mycarousel" data-slide-to="2"></li>
    <li data-target="#mycarousel" data-slide-to="3"></li>
    <li data-target="#mycarousel" data-slide-to="4"></li>
  </ol>-->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item">
        <img src="1.jpg" data-color="lightblue" alt="First Image">
        <div class="carousel-caption">
            
        </div>
    </div>
    <div class="item">
        <img src="2.jpg" data-color="firebrick" alt="Second Image" width="100%">
        <div class="carousel-caption">
            
        </div>
    </div>
    <div class="item">
        <img src="3.jpg" data-color="violet" alt="Third Image" width="100%">
        <div class="carousel-caption">
            
        </div>
    </div>
    <div class="item">
        <img src="4.jpg" data-color="lightgreen" alt="Fourth Image" width="100%">
        <div class="carousel-caption">
         
        </div>
    </div>
    <div class="item">
        <img src="25.jpg" data-color="tomato" alt="Fifth Image" width="100%">
        <div class="carousel-caption">
           
        </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<br>
<br>
<div><a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/tea.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/can.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/burger.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/burrito.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/french-fries.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/noodles.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/hamburguer.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/pizza.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/sandwich.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/cake.svg" style="width:50px;height:50px;"></a>
<a class="w3-padding w3-margin" href="#"><img class="w3-margin-bottom" src="img/can(1).svg" style="width:50px;height:50px;"></a>
</div> 
<div id="Restaurants"></div>
<br>
<div  class="w3-container">
<h1>Restaurants </h1>
</div>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third w3-margin-bottom">
    <div class="w3-card-2">
     <a id="hot-1" href="grt.php"><img src="img/hotel-1.png" style="width:100%"></a>
      <div class="w3-container">
        <h5>Hotel-1</h5>
    
      </div>
    </div>
  </div>

  <div class="w3-third w3-margin-bottom">
    <div class="w3-card-2">
      <a id="hot-2" href="hotel21.php"><img src="img/hotel-2.png" style="width:100%"></a>
      <div class="w3-container">
        <h5>Hotel-2</h5>
     
      </div>
    </div>
  </div>

  <div class="w3-third w3-margin-bottom">
    <div class="w3-card-2">
      <a id="hot-3" href="hotel3.php"><img src="img/hotel-3.png" style="width:100%"></a>
      <div class="w3-container">
        <h5>Hotel-3</h5>
     
      </div>
    </div>
  </div>
</div>

	<div id="cd-shadow-layer"></div>

	<div id="cd-cart">
<div>
<div id="checkin" style="position:absolute;top:50%;left:40%;">
<form method="post" action="login.php" >
<input type="hidden" name="checking" value="index">
<button class="w3-btn w3-red" type="submit" >Login</button>
</form>
</div>
<div id="checkinone">
<br>
                <span><img class="i" src="img/man.svg" style="width:100px;height:100px;margin-left:35%;"</span><br>
		<h2 style="font-size:10px;position:absolute;left:30%;"><?php echo $s ?></h2>
<br>
<br>
<br>
		<ul class="cd-cart-items">
			 <li>
<a style="color: red" href="orders.php"> Your orders</a>
</li>
      <li>
<a style="color: red" href="change-pwd.php"> Change Password</a>
</li>
    <li>
<a style="color:red"  href='logout.php'>Logout</a>
</li>	
		</ul> <!-- cd-cart-items -->
	</div> <!-- cd-cart -->
</div>
<br>
 <div class="w3-container w3-bottom w3-red w3-small">
 foodcent.com @2017 
 </div> 

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js'></script>

    <script src="js/index.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script>
<script>
localStorage.setItem('count', '1');
$("#hot-1").click(function(){
if(localStorage.getItem('count')==1)
{
localStorage.setItem('hotel-one', '0');
localStorage.setItem('count', '2');
}
}
);
$(document).ready(function(){
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
<script>
var slideIndex = 1;
showDivs(slideIndex);
function plusDivs(n) {
  showDivs(slideIndex += n);
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
// Filter
function my() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDIV");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
function myFunction() {
    var x = document.getElementById("demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>


</body>
</html>