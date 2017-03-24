<?PHP
session_start();
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
$s = $_SESSION['name_of_user'];
$date=$_POST['dat'];
$hotel =$_POST['hotel'];
$sum = $_POST['total']; 
$query="SELECT `iname`, `count`,`price` FROM `cart` WHERE `name`='$s' and `time`='$date' and `hotel`='$hotel'";
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
h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #F44336, #E91E63);
  background: linear-gradient(to right, #F44336, #E91E63);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
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
<li><a style="color: white" href="main.php"> Home</a></li>
    </ul>
  </nav>
<div class="w3-display-topright" style="position:fixed;top:23%;color:white;right:25%;font-size:35px;"><img src="img/rupee.svg" style="width:30px;height:30px;"><?php echo $sum ?></div>
<br><br><br><br><br><br>
<div class="chip">
  <a href="orders.php"><img src="img/back.svg" alt="Person" width="96" height="96"></a>
Order Details
</div>
<br><br>
<section>
  <!--for demo wrap-->
  
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Item Name</th>
          <th>Count</th>
          <th>Price</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
     
     
                <?php while($row = mysqli_fetch_array($search_result)):?>
 <tbody>
                   <tr>
          <td><?php echo $row['iname'];?></td>
          <td><?php echo $row['count'];?></td>
          <td><?php echo $row['price'];?></td>
        </tr>
</tbody>
                <?php endwhile;?>
    
    </table>
  </div>
</section>
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
<script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
</body>
</html>