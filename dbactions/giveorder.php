<?php
session_start();
error_reporting(0);
require_once("../connect.php");

if(isset($_SESSION['stuid']))
{
if(isset($_POST['pid']) && isset($_POST['stuid']))
{

$pid=strip_tags($_POST['pid']);
$stuid=strip_tags($_POST['stuid']);

//product data
$prod=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE sno='$pid'"));
$proname=$prod['name'];
$sellerid=$prod['posted_by'];
$procat=$prod['procat'];
$posted=$prod['postedpostedfull'];

//isdata given
$givd=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM passwords WHERE ID='$stuid'"));
$datagiven=$givd['datagiven'];

//student data
$stu=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM userdata WHERE stuid='$stuid'"));
$stuname=$stu['name'];
$stugender=$stu['gender'];
$stubranch=$stu['branch'];
$stuclass=$stu['class'];
$stuyear=$stu['year'];
$stumobile=$stu['mobile'];
$stuorders=$stu['orders'];
$ip=$_SERVER['REMOTE_ADDR'];
//checking if data is given or not
if($datagiven==1)
{
if(mysqli_query($con,"INSERT INTO orders(buyerid,buyername,class,dorm,mobile,proid,proname,branch,year,order_date,fulldate,ip,sellerid) VALUES ('$stuid','$stuname','$stuclass','$studorm','$stumobile','$pid','$proname','$stubranch','$stuyear',CURDATE(),NOW(),'$ip','$sellerid')"))
{
$description=" ".$stuid." Wants ".$proname." You Posted on ".$posted." in ".$procat." Category";


if(mysqli_query($con,"INSERT INTO buyingnotices(nfrom,nto,proid,description,notice_at) VALUES ('$stuid','$sellerid','$pid','$description',NOW())") or die(mysqli_error()))
{
echo "ordered";
}
}
}
else
{
echo "Details";
}
}
}
else
{
echo "Not authorised";
}
?>
