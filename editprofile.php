<?php
session_start();
require_once("connect.php");
if(isset($_SESSION['stuid'])){
$stuid=strip_tags($_SESSION['stuid']);
$det=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM userdata WHERE stuid='$stuid'"));
$cls=array();

$stats=mysqli_query($con,"SELECT * FROM products WHERE posted_by='$stuid'");
$delstats=mysqli_num_rows(mysqli_query($con,"SELECT * FROM products WHERE posted_by='$stuid' && visibility='0'"));
$soldout=mysqli_num_rows(mysqli_query($con,"SELECT * FROM orders WHERE sellerid='$stuid' && visibility='1'"));
$post=mysqli_num_rows($stats);
?>
<section class="main">
				<div class="pag-nav">
				<ul class="p-list">
					<li><a href="index.html">Home</a></li> &nbsp;&nbsp;/&nbsp;
					<li class="act">&nbsp;Edit profile</li>
				</ul>
			</div>
			
			<div class="login-signup-form">
								<div class="col-md-2 benefits" style='margin-right:30px;'>
					<h4><?php echo $stuid;?> Profile Statistics</h4>
					<p>Last Update at : <?php echo $det['lastupdate'];?></p>
					<p>Last Update ip : <?php echo $det['lastupdateip'];?></p>
					<p>No.of edits : <?php echo $det['noofedits'];?></p>
				</div>

				<form enctype="multipart/form-data" method="post" >
				<div class="col-md-2 sign-up text-center"   id="editpro" style="background:#f2f2f2;width:40%;">
					<div>
					<h4><?php echo $_SESSION['stuid'];?> Edit Profile</h4>
					<center><div id="status" style="displa:none;"></div></center>
					<div class="cus_info_wrap">
						<label class="labelTop">
						Name
						<span class="require">*</span>
						</label>
						<input type="text" id="stuname" name="stuname"  value="<?php echo $det['name'];?>"  Placeholder="Student Name" class="vpb_textAreaBoxInputs">
					</div>
					
					
					<div class="clearfix"></div>
				    <div class="cus_info_wrap">
						<label class="labelTop">
						Gender
						<span class="require">*</span>
						</label>
					<select id="gender" style="width:70%;">
					<option value="<?php echo $det['gender'];?>"><?php echo $det['gender'];?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					</select>
					</div>
					
					
					
					<div class="clearfix"></div>
				    <div class="cus_info_wrap">
						<label class="labelTop">
						Branch
						<span class="require">*</span>
						</label>
					<select id="branch" style="width:70%;">
						<option value="<?php echo $det['branch'];?>"><?php echo $det['branch'];?></option>
					<?php
							$bran=mysqli_query($con,"SELECT * FROM branchcat WHERE branch!='ALL'");
							 while($branchd=mysqli_fetch_array($bran))
							 {
							echo "<option value=".$branchd['branch'].">".$branchd['branch']."</option>";
							 }
							?>
					</select>
					</div>
					
					
					
					<div class="clearfix"></div>
				    <div class="cus_info_wrap">
						<label class="labelTop">
						Programme
						<span class="require">*</span>
						</label>
					<select id="block" style="width:35%;">
					<option value=""></option>
					<option value="b-tech">b-tech</option>
					<option value="m-tech">m-tech</option>
					
					</select>
					
					
					
					</div>
					
					<div class="clearfix"></div>
				    <div class="cus_info_wrap">
						<label class="labelTop">
						Year
						<span class="require">*</span>
						</label>
					<select id="year" style="width:70%;">
					<option value="<?php echo $det['year'];?>"><?php echo $det['year'];?></option>
					<option value="1st-year">1st year</option>
					<option value="2nd year">2nd year</option>
					<option value="3rd year">3rd year</option>
					<option value="4th year">4th year</option>
					
					</select>
					</div>
					
					<div class="cus_info_wrap">
						<label class="labelTop">
						Dorm
						<span class="required"></span>
						</label>
						<input type="text" id="dorm" name="dorm"  value="<?php echo $det['dorm'];?>"  Placeholder="Dormitory" class="vpb_textAreaBoxInputs">
					</div>
					
					<div class="cus_info_wrap">
						<label class="labelTop">
						Mobile
						<span>optional</span>
						</label>
						<input type="text" id="mobile" name="mobile"  value="<?php echo $det['mobile'];?>"  Placeholder="Mobile Number" class="vpb_textAreaBoxInputs">
					</div>
					<div class="cus_info_wrap">
						<label class="labelTop">
						Email
						<span class="required"></span>
						</label>
						<input type="text" id="email" name="email"  value="<?php echo $det['email'];?>"  Placeholder="email address" class="vpb_textAreaBoxInputs">
					</div>
					
					
					<div class="botton1">
					<input  value="Update" onclick="updateprofile()" class="botton">
				</div>
				</div>
				</div>
				</form>
					<div class="col-md-2 benefits">
					<h4><?php echo $stuid;?> Items Statistics</h4>
					<p>Posted : <?php echo $post;?></p>
					<p>Deleted : <?php echo $delstats;?></p>
					<p>Soldout: <?php echo $soldout;?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</div>
		</section>
	 <?php
 }
 ?>
