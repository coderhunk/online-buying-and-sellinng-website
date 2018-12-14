<?php
session_start();
error_reporting(0);
require_once("../connect.php");

if(isset($_SESSION['stuid']))
{
$stuid=$_SESSION['stuid'];
mysqli_query($con,"UPDATE buyingnotices SET sellerview='1' WHERE nto='$stuid'");
}

?>
