<?PHP
require_once("./include/membersite_configone.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.html");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Hotel Register</title>
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
 <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script> 
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<script src="js/pace.js"></script>
<link rel="STYLESHEET" type="text/css" href="themes/white/pace-theme-minimal.css">
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
input[type="number"] {
  padding: 10px;
  border: none;
  border-bottom: solid 2px white;
  transition: border 0.3s;

}
input[type="number"]:focus,
input[type="number"].focus {
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

</style>
</head>
<body class="w3-red w3-margin-right">
<br>

<a class="w3-display-topleft w3-margin " href="hotellogin.php"><img src="img/store.svg" style="width:40px;height:40px;"></a>
<div class="q w3-display-middle"><img src="img/a.png"></div>
<div class="s w3-container w3-display-left w3-margin-left" style="color:white;"><span class="w3-pacifico w3-jumbo">FOOD CENT</span></div>
<div class="w3-container w3-display-right w3-margin-right">
<form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<span class="w3-pacifico w3-large">Hotel Register</span><br><br>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<input class="w3-red"  type='hidden'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
<span><img src="img/user.svg" style="width:30px;height:30px;"></span>
<input class="w3-red"  type='text' name='name' id='name' placeholder="Hotelname" value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" /><br/>
  <span id='register_name_errorloc' class='error'></span>
</div><br/>
<div class='container'>
<span><img src="img/letter.svg" style="width:30px;height:30px;"></span>
 <input class="w3-red" type='text' name='email' id='email' placeholder="gmail" value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50"  /><br/>
    <span id='register_email_errorloc' class='error'></span>
</div><br/>
<div class='container'>
<span><img src="img/phone.png" style="width:30px;height:30px;"></span>
 <input class="w3-red"  type='number' name='phone' id='phone' placeholder="phone number" value='<?php echo $fgmembersite->SafeDisplay('phone') ?>' maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10" /><br/>
    <span id='register_phone_errorloc' class='error'></span>
</div><br/>
<div class='container'>
<span><img src="img/user.svg" style="width:30px;height:30px;"></span>
<input class="w3-red"  type='text' maxlength="50"  name='username' id='username' placeholder="username" value='<?php echo $fgmembersite->SafeDisplay('username') ?>' /><br/>
    <span id='register_username_errorloc' class='error'></span>
</div><br/>
<div class='container'>

 <div class='pwdwidgetdiv' id='thepwddiv' ></div>
<span><img src="img/key.svg" style="width:30px;height:30px;"></span>
    <input class="w3-red"  type='password' name='password' id='password' placeholder="password" maxlength="50"  />  
    <div id='register_password_errorloc' class='error' style='clear:both'></div>
</div><br/>
<div class='w3-container'>
<input class="w3-btn w3-white w3-text-red w3-round-xxlarge" type='submit' name='Submit' value='Register' />
</div>
</form>
<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("phone","req","Please provide a phone number");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>
<script>

</script>
</div>
</body>
</html>