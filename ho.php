<?php
session_start();
$_SESSION['login'] = true;
$_SESSION["hotel"] = $_POST['hname']; 
$_SESSION["hotelone"] = $_POST['hname'];
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost 	= "localhost";
$dbname		= "id682590_foodlover";
$dbuser		= "id682590_foodlovertk";
$dbpass		= "seshu";

// database connection
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// new data

$user = $_POST['hname'];
$password = $_POST['pword'];

if($user == '') {
	$errmsg_arr[] = 'You must enter your Hotelname';
	$errflag = true;
}
if($password == '') {
	$errmsg_arr[] = 'You must enter your Password';
	$errflag = true;
}

// query
$result = $conn->prepare("SELECT * FROM hotel WHERE hotelname= :hjhjhjh AND password= :asas");
$result->bindParam(':hjhjhjh', $user);
$result->bindParam(':asas', $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
header("location: q.php");
}
else{
	$errmsg_arr[] = 'Username and Password are not found';
	$errflag = true;
}
if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: hotellogin.php");
	exit();
}

?>