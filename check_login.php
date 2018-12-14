<?php
session_start();
error_reporting(0);
require_once("connect.php");

if(isset($_POST['stuid']) && isset($_POST['stupasswd']))
{
$stuid=strip_tags(htmlspecialchars(addslashes(strtoupper($_POST['stuid']))));
$stupasswd=strip_tags(htmlspecialchars(addslashes($_POST['stupasswd'])));

$dup=mysqli_query($con,"SELECT * FROM passwords WHERE ID='$stuid' AND Password='$stupasswd'");
if(mysqli_num_rows($dup)==1)
{
$_SESSION['stuid']=$stuid;
echo "success";

}
else
{
echo "invalid";
}
}

?>
