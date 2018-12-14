<?php
session_start();
require_once("connect.php");
if(isset($_POST['pid']))
{
$pid=$_POST['pid'];
$newpr=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE sno='$pid'"));
?>
<script src="js/jquery.min.js"></script>
<script>
function shwfiel(){$("#ord").slideToggle("slow");}
function orderpro(pid)
{
	stuid=$("#stuid").val();
	if(stuid!="" || stuid!=false)
	{
	$.post("dbactions/giveorder.php",{pid:pid,stuid:stuid},function(data){if(data.indexOf("ordered")!=-1){$("#sold").slideUp(1000);$("#sold").html("<img src='img/like.png'> <font color='green'>Succesfully Ordered..</font>");$("#sold").slideDown();}if(data.indexOf("Details")!=-1){$("#error").html("<font color=red><a style='cursor:pointer;color:red;' onclick=load_page('editprofile.php')>Please Fill Your Details here</a></font>");};});
}
}
								</script>
		<!-- start main -->
<div class="main_bg">
	<div class="main">	   		           	         
		<!-- start span1_of_1 -->
			<div class="left_content">
			<div class="span_1_of_left">
				<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								
									<img class="etalage_thumb_image" src="products/<?php echo $newpr['attachment'];?>" class="img-responsive" width="250px" height="250px"/>
							
							</li>
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div>

			<!-- start span1_of_1 -->
			<div class="span1_of_1_des">
				  <div class="desc1">
					<h3><?php echo $newpr['name'];?> <?php 
					if($newpr['posted_date']==$today)
					{
						?> <img src='img/new.gif'>
					
					<?php } ?> </h3>	
					<p><?php echo $newpr['description'];?></p>
					<h5>Rs. <?php echo $newpr['cost'];?> <a style='cursor:pointer;' onclick=shwprofile("<?php echo $newpr['posted_by'];?>")>by <?php echo $newpr['posted_by'];?></a></h5>
					<div class="available">
						<ul>
							<li><b>Posted in :</b> <?php echo $newpr['branchcat'];?> >> <?php echo $newpr['procat'];?></li><br><li><b>Posted by :</b> <?php echo $newpr['posted_by'];?></li>
						   <br><li><b>Posted at :</b> <?php echo $newpr['postedfull'];?></li>
						</ul>
						<?php
						if(isset($_SESSION['stuid']))
						{
						$boo=mysqli_query($con,"SELECT * FROM orders WHERE proid='$pid'");
						$bo=mysqli_fetch_array($boo);
						$booked=mysqli_num_rows($boo);
						if($booked>=1)
						{
							?>
						<div class="btn_form">
							<form>
								<input type="button" value="<?php echo $bo['buyerid'];?> Bought this.." /><?php if($bo['sellerid']==$newpr['posted_by'])
						{?><input type="button" onclick=shwbuyerprofile("<?php echo $bo['buyerid'];?>") value="View <?php echo $bo['buyerid'];?> profile" /><?php } ?><br>
						
							</form>
						</div>
								
							<?php
						}
						else
						{
							?>
						<div class="btn_form" id='sold'>
							<form>
								<input type="button" value="Add to cart" onclick="shwfiel()" />&nbsp;<input type="button" value="Seller will contact you after ordering" onclick="shwprofile("<?php echo $newpr['posted_by'];?>")" /><br><br>
								<span id='ord' style="display:none;"><input type="text" maxlength="7" id="stuid"  value="<?php echo $_SESSION['stuid'];?>"class="vpb_textAreaBoxInputs" readonly disabled>&nbsp;&nbsp;<input class="botton" type="button" value="order" onclick=orderpro("<?php echo $pid;?>")></span>
								
							</form>
							<div id="error"></div>
						</div>
						<?php
					}
					}
					else
					{
						?>
						<div class="btn_form">
							<form>
						<input class="botton" type="button" value="Please Login to Order this" onclick="vpb_show_login_box()" style="cursor:pointer;min-width:250px;text-decoration:none;" >
						
							</form>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
						
					</div>
			   	 </div>

			   	</div>
			   	
				</div>
				
			   	</div>

	<div class="sub-cate single-subcate">
		<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">OTHER ITEMS</h3>
		 <ul class="menu">
		
		<ul class="kid-menu ">
			
			<?php
							$othp=mysqli_query($con,"SELECT * FROM products WHERE visibility='1' && branchcat='".$newpr['branchcat']."' && sno!='$pid' ORDER BY sno DESC limit 10");
							 while($othpd=mysqli_fetch_array($othp))
							 {
								 
					if($othpd['posted_date']==$today)
					{
					 $new="<img src='img/new.gif'>";
				 }
				 else
				 {
					 $new="";
				 }
					
				$pname=$othpd['name'];
							 echo "<li><a style='cursor:pointer;' style='cursor:pointer;' onclick=showproduct(".$othpd['sno'].")>".$pname." ".$new."</a></li>";
					
							 }
							?>
						</ul>
	</ul>
	<?php
	if(mysqli_num_rows($othp)>12)
	{
	echo "<a style='cursor:pointer;' id='".$newpr['branchcat']."' name='overall/".$newpr['procat']."' onclick='load_page(this.name,this.id)'>View more products</a>";
	}
	?>
					</div>
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">CATEGORIES</h3>
		 <ul class="menu">
		
		<ul class="kid-menu ">
			
			<?php
							$bran=mysqli_query($con,"SELECT * FROM procat");
							 while($branchd=mysqli_fetch_array($bran))
							 {
				                $procat=$branchd['procat'];
								$procat=strtolower($procat);
					$newbr=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM products WHERE procat='$procat'"));
					if($newbr['posted_date']==$today)
					{
					 $new="<img src='img/new.gif'>";
				 }
				 else
				 {
					 $new="";
				 }
				 
								
							 echo "<li><a style='cursor:pointer;' id='".$newpr['branchcat']."' name='overall/".$procat.".php' onclick='load_page(this.name,this.id)'>".$branchd['procat']."".$new."</a></li>";
					
							 }
							?>
						</ul>
	</ul>
					</div>
					
					 
			</div>
	 <div class="clearfix"> </div>
</div>

</div>
</div>
	
<?php
}
else
{
echo "Invalid Parameter";
}
?>
