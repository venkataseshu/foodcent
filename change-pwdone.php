<?PHP
require_once("./include/membersite_configone.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("hotellogin.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->ChangePassword())
   {
        $fgmembersite->RedirectToURL("changed-pwdone.html");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Change password</title>
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
      <script src="scripts/pwdwidget.js" type="text/javascript"></script> 
<style>
.bu:focus
{
outline:0;
}
</style>      
</head>
<body>
<header>
    <div id="logo"><span class="w3-pacifico w3-xlarge">FOOD CENT</span></div>
        <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>

  </header>
  <nav id="main-nav">
    <ul>
     <li><a style="color: white" href="q.php">Home</a></li>
     <li><a style="color: white" href="hotellogout.php">Logout</a></li>
    </ul>
  </nav>
<!-- Form Code Start -->
<div class="w3-container w3-display-middle" >
<form class="w3-form" id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<h2 style="color:#f33446">Change Password</h2>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<span id='changepwd_oldpwd_errorloc' class='error'></span>
    <span id='changepwd_newpwd_errorloc' class='error'></span>
<div class='pwdwidgetdiv' id='oldpwddiv' ></div><br/>
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='w3-container'>
    <label for='oldpwd' >Old Password<span style="color:#f33446">*</span>:</label><br/>
    
    <input class="w3-input" type='password' name='oldpwd' id='oldpwd' maxlength="50" style="width:300px;"/>   
</div><br>

<div class='w3-container'>
    <label for='newpwd' >New Password<span style="color:#f33446">*</span>:</label><br/>
    <div class='pwdwidgetdiv' id='newpwddiv' ></div>
  
    <input class="w3-input" type='password' name='newpwd' id='newpwd' maxlength="50" style="width:300px;"/><br/>
    
   
</div>

<br/>
<div class='container'>
    <input class="w3-btn w3-red" type='submit' name='Submit' value='Submit' style="width:100px;"/>
</div>

</form>


<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('oldpwddiv','oldpwd');
    pwdwidget.enableGenerate = false;
    pwdwidget.enableShowStrength=false;
    pwdwidget.enableShowStrengthStr =false;
    pwdwidget.MakePWDWidget();
    
    var pwdwidget = new PasswordWidget('newpwddiv','newpwd');
    pwdwidget.MakePWDWidget();
    
    
    var frmvalidator  = new Validator("changepwd");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("oldpwd","req","Please provide your old password");
    
    frmvalidator.addValidation("newpwd","req","Please provide your new password");

// ]]>
</script>


</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>