<?PHP
require_once("./include/membersite_config.php");

$success = false;
if($fgmembersite->ResetPassword())
{
    $success=true;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Reset Password</title>
<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/se.css">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 <link rel="stylesheet" href="css/style.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <script src="js/modernizr.js"></script>
<script src="js/pace.js"></script>
<link rel="STYLESHEET" type="text/css" href="themes/white/pace-theme-minimal.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>
<header>
    <div id="logo"><span class="w3-pacifico w3-xlarge">FOOD CENT</span></div>

    <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
  </header>

  <nav id="main-nav">
    <ul>
    <li><a style="color: white" href="login.php">logout</a></li>

    
    </ul>
  </nav>
<div class="w3-container w3-display-middle" id='fg_membersite_content'>
<?php
if($success){
?>
<h2 style="color:green;font-size:30px;">Password is Reset Successfully</h2>
Your new password is sent to your email address.
<?php
}else{
?>
<h2>Error</h2>
<span class='error' style="font-size:30px;><?php echo $fgmembersite->GetErrorMessage(); ?></span>
<?php
}
?>
</div>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>