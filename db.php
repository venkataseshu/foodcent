<?php
session_start();
require_once("./include/membersite_config.php");
$servername = "localhost";
$username = "id682590_foodlovertk";
$password = "seshu";
$database = "id682590_foodlover";
$name= $_SESSION['name_of_user'];
$phone=$_POST['postphonenumber'];
$address=$_POST['postaddress'];
$hotel=$_POST['posthotel'];
$order=$_POST['postorder'];
$nop=$_POST['postnop'];
$timeo=$_POST['posttimeo'];
$itno=$_POST['postitno'];
$total=$_POST['posttotal'];
$date = date('Y-m-d');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql =" INSERT INTO person (name,phno,address,hotel,orders,nop,itno,total,timeo,time)
    VALUES ('$name','$phone','$address','$hotel','$order','$nop',$itno,'$total','$timeo','$date')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Order Placed Sucessfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>