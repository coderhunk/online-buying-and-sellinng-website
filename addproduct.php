<?php
session_start();
require_once("connect.php");
if(isset($_SESSION['stuid'])){
	$stuid=$_SESSION['stuid'];
$stats=mysqli_query($con,"SELECT * FROM products WHERE posted_by='$stuid'");
$delstats=mysqli_num_rows(mysqli_query($con,"SELECT * FROM products WHERE posted_by='$stuid' && visibility='0'"));
$soldout=mysqli_num_rows(mysqli_query($con,"SELECT * FROM orders WHERE sellerid='$stuid' && visibility='1'"));
$post=mysqli_num_rows($stats);
?>
<section class="main">
				<div class="pag-nav">
				<ul class="p-list">
					<li><a href="index.html">Home</a></li> &nbsp;&nbsp;/&nbsp;
					<li class="act">&nbsp;Add Product</li>
				</ul>
			</div>
			<div class="login-signup-form">
				<form enctype="multipart/form-data" method="post" action="dbactions/addproduct-db.php" onsubmit="return addproduct()">
				<div class="col-md-2 sign-up text-center" style="background:#f2f2f2;width:70%;">
					<h4>Add Product</h4>
					<center><div id="status" style="displa:none;"></div></center>
					<div class="cus_info_wrap">
						<label class="labelTop">
						Title of Product
						<span class="require">*</span>
						</label>
						<input type="text" id="ptitle" name="ptitle"  value=""  Placeholder="Title of Product" class="vpb_textAreaBoxInputs">
					</div>
					
					
					<div class="clearfix"></div>
				    <div class="cus_info_wrap">
						<label class="labelTop">
						Description
						<span class="require">*</span>
						</label>
						<textarea rows="10" id="pdesc" name="pdesc" Placeholder="Description of Product" cols="46"></textarea>
					</div>
					
					<div class="clearfix"></div>
				    <div class="cus_info_wrap">
						<label class="labelTop">
						Image
						<span class="require">*</span>
						</label>
					 <input type="file" name="File" id="File">
					</div>
					
					 
					<div class="clearfix"></div><div class="cus_info_wrap">
						<label class="labelTop confirmpass">
						Branch
						<span class="require">*</span>
						</label>
						<select id="pbran" name="pbran" style="width:70%;height:30px;background:#fff;color:black;">
							<option value="">Select</option>
							<?php
							$bran=mysqli_query($con,"SELECT * FROM branchcat");
							 while($branchd=mysqli_fetch_array($bran))
							 {
							echo "<option value=".$branchd['branch'].">".$branchd['branch']."</option>";
							 }
							?>
							</select>
					</div>
					
					
					<div class="clearfix"></div><div class="cus_info_wrap">
						<label class="labelTop confirmpass">
						Product Category
						<span class="require">*</span>
						</label>
						<select id="pproc" name="pproc" style="width:70%;height:30px;background:#fff;color:black;">
							<option value="">Select</option>
							<?php
							$bran=mysqli_query($con,"SELECT * FROM procat");
							 while($branchd=mysqli_fetch_array($bran))
							 {
							echo "<option value=".$branchd['procat'].">".$branchd['procat']."</option>";
							 }
							?>
							</select>
					</div>
					
					
					<div class="cus_info_wrap">
						<label class="labelTop">
						Cost
						<span class="require">*</span>
						</label>
						<input type="text" id="pcost" name="pcost" Placeholder="Enter Cost of product"  value="" class="vpb_textAreaBoxInputs">
					</div>
					<div class="botton1">
					<input type="submit" value="Add product" name="submit"  class="botton">
				</div>
				</div>
				</form>
				<div class="col-md-2 benefits">
					<h4><?php echo $stuid;?> Statistics</h4>
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
