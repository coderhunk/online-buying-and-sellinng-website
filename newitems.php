<?php
include "connect.php"; //Database Connection
date_default_timezone_set("Asia/calcutta");
$today=date("Y-m-d");
?>

<style>
h4 { font-size:18px; color:#666666; font-weight:bold; }
.years .year {position:relative; padding-bottom:60px; margin-bottom:40px; }
.years .year.fromleft {padding-left:130px;width:900px; background:url(left.png) no-repeat left bottom;}
.years .year.fromright {padding-right:130px;width:900px; background:url(right.png) no-repeat right bottom;}
.years .year .date {position:absolute; top:0; padding:6px 0; text-align:center; width:100px; font-size:16px; font-weight:bold; background:#336699; color:#fff; text-shadow:0 1px 0 #fff; border-bottom:1px solid #999999; }
.years .year.fromleft .date {left:0;}
.years .year.fromright .date {right:0;}
.years .year.last {background:none; padding-bottom:0;}

#newp
{
	display:inline;
	float: left;
	position: relative;
	margin-right: 10px;
	width:100%;
	background:#fff;
	padding:10px;
	border:4px solid #f2f2f2;
}
</style>

<div style='background:white;' id="newp">
            	<center><div class="grid alpha">
                	<center><h1 class="title">New Items</h1></center><br>
                   
   <div class="years">
	   <?php
	   $sell=mysqli_query($con,"SELECT * FROM sellingnotices  WHERE visibility='1' ORDER BY sno DESC LIMIT 40");
while($selln=mysqli_fetch_array($sell))
{
	$pid=$selln['proid'];
	$prode=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE sno='$pid'"));
	$my_array = array("year fromleft","year fromright");

shuffle($my_array);
	   ?>
                    	<div class="<?php echo $my_array[0]; ?>">
                        	<div class="date"><?php echo $selln['nfrom'];?></div>
                            <h4> <?php echo $prode['name']; if($selln['posted_date']==$today){ echo " <img src='img/new.gif'>";}?></h4>
                           <?php echo $selln['description'];?>
                        </div>
                       <?php } ?>
                    </div>
</center>
</div>
