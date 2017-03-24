<?PHP
session_start();
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
$s = $_SESSION['name_of_user'];
$query = "SELECT  `hotel`,`orders`,`nop`,`itno`,`total`,`paid`,`time` FROM `person` WHERE `name`='$s'ORDER BY time DESC";
    $search_result = filterTable($query);
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "id682590_foodlovertk", "seshu", "id682590_foodlover");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Your orders</title>
    <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/se.css">
<script src="js/pace.js"></script>
<link rel="STYLESHEET" type="text/css" href="themes/white/pace-theme-minimal.css">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 <link rel="stylesheet" href="css/style.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <script src="js/modernizr.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
<style>
table td{
border:2px solid white;
}
table
{
border:2px solid white;
}
@media only screen and (min-width: 320px) {
  span
{
font-size:8pt;
}
}
button div
{
float:left;
}
.chip {
    display: inline-block;
    padding: 0 25px;
    height: 50px;
    font-size: 16px;
    line-height: 50px;
color:#5D6D7E;
    border-radius: 25px;
    background-color: #f1f1f1;
}

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 50px;
    width: 50px;
    border-radius: 50%;
}
a
{
text-decoration:none;
}
.bu:focus
{
outline:0;
}
</style>
</head>
<body style="background-color:#f33446;">
<header>
    <div id="logo"><span class="w3-pacifico w3-xlarge">FOOD CENT</span></div>
        <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
<div id="cd-cart-trigger"><button class="bu w3-red w3-padding-8" href="#0" style="border:none;"><span style="overflow:hidden;fontsize:20px;"><img  src="img/man.svg" style="width:50px;height:30px;color:white;box-shadow:none;padding-right:10px;"></img><span></button></div>
  </header>
  <nav id="main-nav">
    <ul>
<li><a style="color: white" href="index.php"> Home</a></li>
     
    </ul>
  </nav>
<div class="w3-container" id='fg_membersite_content' style="position:absolute;top:10%;">
<span style="color:white">Welcome back <span style="font-size:12pt;"><?= $fgmembersite->UserFullName(); ?>!</span></span>
<br><br>
<div class="chip">
  <a href="index.php"><img src="img/back.svg" alt="Person" width="96" height="96"></a>
 Your Orders
</div>
<br><br>
                <?php while($row = mysqli_fetch_array($search_result)):?>
<div>
<form action="or.php" method="post">
<button class="w3-white w3-margin-left" style="width:100%;" type="submit" name="dat" value="<?php echo $row['time'];?>" >
<input type="hidden" name="hotel" value="<?php echo $row['hotel'];?>">
<input type="hidden" name="total" value="<?php echo $row['total'];?>">
<div>
<h4 style="font:uppercase;">&nbsp;<?php echo $row['hotel'];?>&nbsp;(<?php echo $row['time'];?>)</h4>
<div class="w3-container">
<div class="w3-margin-left">
Order Type:<?php echo $row['orders'];?><br>
Table No:<?php echo $row['nop'];?><br>
ToTal Items:<?php echo $row['itno'];?><br>
Paid/Not Paid:<?php echo $row['paid'];?>
</div>
<div class="w3-margin-left">
<span class="w3-margin-left w3-margin-top" style="font-size:24pt;"><?php echo $row['total'];?>/-</span>
</div>
</div>
</div>
</button>
</form>
<br>
<br>
                <?php endwhile;?>
        
</div>
	<div id="cd-cart">
<br>
                <span><img class="i" src="img/man.svg" style="width:100px;height:100px;margin-left:27%;"</span><br>
		<h2 style="font-size:10px;position:absolute;left:30%;"><?php echo $s ?></h2>
<br>
<br>
<br>
		<ul class="cd-cart-items">
			 
      <li>
<a style="color: red" href="change-pwd.php"> Change Password</a>
</li>
    <li>
<a style="color:red"  href='logout.php'>Logout</a>
</li>	
		</ul> <!-- cd-cart-items -->
	</div> <!-- cd-cart -->
<script src="js/index.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>