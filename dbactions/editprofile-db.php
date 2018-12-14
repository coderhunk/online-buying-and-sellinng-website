<?php
session_start();
error_reporting(0);
require_once("../connect.php");

if(isset($_SESSION['stuid']))
{
$stuid=strip_tags($_SESSION['stuid']);

echo "s";
if(isset($_POST['stuname']) && isset($_POST['gender']) && isset($_POST['branch']) && isset($_POST['cls']) && isset($_POST['year']) && isset($_POST['dorm']) && isset($_POST['mobile']))
{
$stuname=mysqli_real_escape_string(strip_tags($_POST['stuname']));
$gender=mysqli_real_escape_string(strip_tags($_POST['gender']));
$branch=mysqli_real_escape_string(strip_tags($_POST['branch']));
$cls=mysqli_real_escape_string(strip_tags($_POST['cls']));
$year=mysqli_real_escape_string(strip_tags($_POST['year']));
$dorm=mysqli_real_escape_string(strip_tags($_POST['dorm']));
$mobile=mysqli_real_escape_string(strip_tags($_POST['mobile']));

$ip=$_SERVER['REMOTE_ADDR'];

$datch=mysqli_query($con,"SELECT * FROM userdata WHERE stuid='$stuid'");
if(mysqli_num_rows($datch)<1)
{
mysqli_query($con,"INSERT INTO userdata(stuid,name,gender,branch,programme,dorm,year,mobile,lastupdate,lastupdateip,noofedits) VALUES('$stuid','$stuname','$gender','$branch','$cls','$dorm','$year','$mobile',NOW(),'$ip','1')") or die(mysqli_error());
mysqli_query($con,"UPDATE passwords SET datagiven='1' WHERE ID='$stuid'");
}
else
{
mysqli_query($con,"UPDATE userdata SET name='$stuname',gender='$gender',branch='$branch',programme='$cls',dorm='$dorm',year='$year',mobile='$mobile',lastupdate=NOW(),lastupdateip='$ip',noofedits=noofedits+1 WHERE stuid='$stuid'");
mysqli_query($con,"UPDATE passwords SET datagiven='1' WHERE ID='$stuid'");
}
}
}
else
{
echo "Not authorised";
}
?>
