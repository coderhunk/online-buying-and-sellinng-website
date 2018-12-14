<?php
session_start();
error_reporting(0);
require_once("../connect.php");

if(isset($_POST['stu']))
{
	$stuid=strip_tags($_POST['stu']);
	$stud=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM userdata WHERE stuid='$stuid'"));
	?>
	<table class="notices"  width="100%">

<tr class="details"><td  colspan="3" style='text-align:center;'><font style='font-size:20px;'><?php echo $stuid;?> DATA</font></td></tr>
<tr id="description"  style="text-align:center;width:100%;border-left:1px dotted #999999;border-right:1px dotted #999999;"><td>University ID</td><td>:</td><td><?php echo $stuid;?></td></tr>
<tr id="description"  style="text-align:center;width:100%;border-left:1px dotted #999999;border-right:1px dotted #999999;"><td>Name</td><td>:</td><td><?php echo $stud['name'];?></td></tr>
<tr id="description"  style="text-align:center;width:100%;border-left:1px dotted #999999;border-right:1px dotted #999999;"><td>Gender</td><td>:</td><td><?php echo $stud['gender'];?></td></tr>
<tr id="description"  style="text-align:center;width:100%;border-left:1px dotted #999999;border-right:1px dotted #999999;"><td>Year</td><td>:</td><td><?php echo $stud['year'];?></td></tr>


<tr class="details"><td  colspan="2"> <span id="login_status"></span></td><td><input class="botton" type="button" value="Close" onclick="vpb_hide_popup_boxes()"></td></tr>
</table>
	<?php
	
	}
?>
