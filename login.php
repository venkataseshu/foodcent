<?PHP
require_once("./include/membersite_config.php");
session_start();
$_SESSION["fa"] = $_POST['checking'];
$ho=$_SESSION["fa"];
$v=0;
if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
         $v=1;
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<script src="js/pace.js"></script>
<link rel="STYLESHEET" type="text/css" href="themes/white/pace-theme-minimal.css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<style>
.w3-pacifico
{
	font-family: 'Pacifico', cursive;
}
input[type="text"] {
  padding: 10px;
  border: none;
  border-bottom: solid 2px white;
  transition: border 0.3s;
}
input[type="text"]:focus,
input[type="text"].focus {
  border-bottom: solid 2px white;
outline:0;
}
input[type="password"] {
  padding: 10px;
  border: none;
  border-bottom: solid 2px white;
  transition: border 0.3s;
}
input[type="password"]:focus,
input[type="password"].focus {
  border-bottom: solid 2px white;
outline:0;
}
@media only screen and (min-width: 320px) {
  .s
{
display:none;
}
  .a
{
display:none;
}
  .q
{
display:none;
}
}
@media only screen and (min-width: 1200px) {
  .s
{
display:block;
}
  .a
{
display:block;
}
  .q
{
display:block;
}
  .p
{
display:none;
}
}
</style>
</head>
<body class="w3-red w3-margin-right">
<br>
<span class="p w3-display-topright w3-pacifico w3-large w3-margin w3-padding-top">Food Cent</span><br><br>
<a class="w3-display-topleft w3-margin " href="hotellogin.php"><img src="img/store.svg" style="width:40px;height:40px;"></a>

<!-- Form Code Start -->
<div class="q w3-display-middle"><img src="img/a.png"></div>
<div class="s w3-container w3-display-left w3-margin-left" style="color:white;"><span class="w3-pacifico w3-jumbo">Food Cent</span></div>

<div class="w3-container w3-display-right w3-margin-right w3-float-left">
<div class="a w3-display-left w3-float-left w3-margin-right" style="width:2px;height:300px;background-color:white;"></div>

<form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<?php echo $s ?>
<span class="w3-pacifico w3-large">User login</span><br><br>
<input type='hidden' name='submitted' id='submitted' value='1'/>


<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <span><img src="img/user.svg" style="width:30px;height:30px;"></span>
    <input class="w3-red"  type='text' name='username' placeholder="username" id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/><br/>
    <span id='login_username_errorloc' class='error'></span>
</div>
<div class='container'>
   <span><img src="img/key.svg" style="width:30px;height:30px;"></span>
    <input class="w3-red"  type='password' name='password' id='password' placeholder="password" maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div><br/>

<div class='w3-container'>
    <input id="click" class="w3-btn w3-white w3-text-red w3-round-xxlarge" type='submit' name='Submit' value='Login' />
 <a class="w3-btn w3-white w3-text-red w3-round-xxlarge" href="register.php" />Register</a>
</div><br/>
<div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>

</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
var che=<?php echo $v ?>; 
var counto=0;
$("#click").click(function()
{
localStorage.setItem("counto",parseInt(localStorage.getItem('counto'))+1 );
})
var d =  localStorage.getItem('counto');
if(d==1)
{
localStorage.setItem("url", "<?php echo $ho.'.php' ?>");
}
if(che==1)
{
location.href = localStorage.getItem('url');
localStorage.setItem("counto", "1");
}
</script>
</body>
</html>