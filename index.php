<?php
session_start();
require_once("connect.php");
$newpr=mysqli_num_rows(mysqli_query($con,"SELECT * FROM products WHERE posted_date=CURDATE()"));
if($newpr<1)
{
	$newprc="";
	}
else
{
	$newprc=$newpr;
}


$rec=mysqli_query($con,"SELECT * FROM products WHERE visibility='1' ORDER BY sno DESC LIMIT 1");
$reccou=mysqli_num_rows(mysqli_query($con,"SELECT * FROM products WHERE visibility='1'"));
while($rece=mysqli_fetch_array($rec))
{
$proname=$rece['name'];
$prosno=$rece['sno'];
$procost=$rece['cost'];
$proattachment=$rece['attachment'];
}



?>
<!DOCTYPE html>
<html>
<head>
<title>Online purschasing Store @ VIT VELLORE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="developer" content="Anshuman Singh">
<script src="iiitolx.js"></script>
</head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		<div class="top-header">
			<div class="wrap">
				<div class="header-left">
					<ul>
						<li><a style="cursor:pointer;" onclick="load_page('aboutus.php')">24x7 Customer Care  </a></li> |
						<li><a style="cursor:pointer;" onclick="load_page('aboutus.php')"> About Us</a></li>
					</ul>
				</div>
				<div class="header-right">
					<ul>
						<?php
						if(isset($_SESSION['stuid']))
						{
							?>
						<li>
							<i class="user"></i>
							<a onclick="load_page('editprofile.php')" style="cursor:pointer;"><?php echo $_SESSION['stuid'];?></a>
						</li>
						<li>
						  <i class="cart"></i>
							<a onclick="load_page('addproduct.php')" style="cursor:pointer;">Add Item</a>
						</li>
						<?php
						 }
						
							 ?>
						<li>
								<?php
						if(!isset($_SESSION['stuid']))
						{
							?><i class="back"></i>
							<a onclick="window.location.href='http://vitrates.com/'"style="cursor:pointer;">BACK</a>|
							<i class="lock"></i>
							<a onclick="vpb_show_login_box()" style="cursor:pointer;">Login</a>|
							<i class="register"></i>
							<a onclick="load_page('register.html')" style="cursor:pointer;">Register</a>|
							<?php
						} ?>
						
							<i class="cart"></i>
							<a onclick="load_page('newitems.php')" style="cursor:pointer;">New Items</a>
						</li>
						<?php if($newprc<1)
						{
						}
						else
						{
							?>
						<li class="last"><?php echo $newprc;?></li>
						<?php } ?>
						
						<?php
						if(isset($_SESSION['stuid']))
						{
							$stuid=$_SESSION['stuid'];
$buyn=mysqli_query($con,"SELECT * FROM buyingnotices WHERE visibility='1' && sellerview='0' && nto='$stuid'");
if(mysqli_num_rows($buyn)>=1)
{
	$cou=mysqli_num_rows($buyn);
}
else
{
	$cou="";
}
							?>
							<li id="notification_li">
								
<span id="notification_count"><?php echo $cou; ?></span>
<a href="#" id="notificationLink">Notifications</a>
<div id="notificationContainer">
<div id="notificationTitle">Notifications</div>
<div id="notificationsBody" class="notifications">
	<?php
	$not=mysqli_query($con,"SELECT * FROM buyingnotices WHERE visibility='1' && nto='$stuid' ORDER BY sno DESC LIMIT 6");
	while($noted=mysqli_fetch_array($not))
	{
		$prid=$noted['proid'];
	if($noted['sellerview']==0)
	{
	echo "<div class='noti' onclick=showproduct(".$prid.") style='border-bottom:1px dotted green;margin-left:10px;padding:10px;background:#e9eaed;font-weight:bold;cursor:pointer;'>".$noted['description']."</div>";	
    }
    else
    {
		
	echo "<div class='noti' onclick=showproduct(".$prid.") style='border-bottom:1px dotted green;margin-left:10px;padding:10px;font-weight:bold;cursor:pointer;'>".$noted['description']."</div>";	
}
	}
	?>
</div>
<div id="notificationFooter"><a href="#">See All</a></div>
</div>

</li>
							<li><i class="lock"></i><a href="logout.php">Logout</a></li>
							<?php
						}
						?>
					</ul>
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="wrap">
			<div class="header-bottom">
				<div class="logo">
					<a href="index.html"><img src="images/logo.jpg" class="img-responsive" alt="" /></a>
				</div>
				<div class="search">
					<div class="search2">
					  <form>
						<input type="submit" value="">
						 <input type="text" placeholder="Search for a product" name="suggested_names" id="suggested_names"/>
					  </form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<div class="wrap">
		<div class="navigation-strip">
			<h4>Branch wise Materials<i class="arrow"></i></h4>
			<div class="top-menu">
				<!-- start header menu -->
		<ul class="megamenu skyblue">
			<li><a class="color1" id="i" href="">Home</a></li>
			<li><a class="color2" id="allgad" name="branches/all.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">ALL</a>
			<li class="grid"><a class="color3"  id="pucgad" name="branches/puc.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">IT</a></li>	
			<li class="grid"><a class="color4"  id="civilgad" name="branches/civil.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">CIVIL</a></li>
			<li class="grid"><a class="color5"  id="chemicalgad" name="branches/chemical.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">CHEMICAL</a></li>				
				<li><a class="color6"  id="csegad" name="branches/cse.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">CSE</a></li>
				<li><a class="color7"  id="ecegad" name="branches/ece.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">ECE</a>	</li>
				
				<li><a class="color9"  id="mechanicalgad" name="branches/mechanical.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">MECHANICAL</a></li>
	
		 </ul> 
	</div>
		<div class="clearfix"></div>
		</div>
		
				<div id="loadcont">
		<div class="main-top">
			<div class="col-md-8 banner">
				<!-- start slider -->
				<!----->
				<div class="slider">	  
					  <div class="callbacks_container">
						  <ul class="rslides" id="slider">
							 <li>
								 <img src="images/slider1.jpg" alt=""/>
							 </li>
							 <li>
								 <img src="images/a.jpg" alt=""/>
							 </li>
							 <li>
								 <img src="images/e.jpg" alt=""/>
							 </li>
							 <li>
								 <img src="images/b.jpg" alt=""/>
							 </li>
						  </ul>	      
					  </div>
				</div>
				<!----->
				<!-- end  slider -->
		   </div>
		   <div class="col-md-4 right-grid">
				<div class="right-grid-top">
					<?php 
$delstats=mysqli_num_rows(mysqli_query($con,"SELECT * FROM products WHERE visibility='1'")); ?>
					<div class="r-sale text-center">
						<h6>Posted Items</h6>
						<h2><?php echo $delstats;?></h2>
					</div>
					<div class="r-discount">
						<span>Sold</span>
						
					<?php 
$postats=mysqli_num_rows(mysqli_query($con,"SELECT * FROM orders WHERE visibility='1'"));
$users=mysqli_num_rows(mysqli_query($con,"SELECT * FROM userdata"));
$remain=$delstats-$postats;
 ?>
						<center><h2><?php echo $postats;?></h2></center>
						<a href="#">In the Cart : <?php echo $remain;?></a>
						<a href="#">Reg..Users : <?php echo $users;?></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="right-grid-bottom">
				<?php if($reccou<1)
					{
					echo "<div class='right-grid-bottom-left'><br><br><h5>No Products in Cart</h5></div><div class='right-grid-bottom-right'><img src='img/inactive.png' /></div>";
					}
					else
					{
						?>
					<div class="right-grid-bottom-left">
					
						<h3>Recent Item</h3>
						<h5><?php echo $proname;?></h5>
						<h2><?php echo $procost;?></h2>
						<a style="cursor:pointer;" onclick=showproduct("<?php echo $prosno;?>")>shop now<i class="go"></i></a>
					</div>
					<div class="right-grid-bottom-right">
						<img src="products/<?php echo $proattachment;?>" width="69px" height="107px" alt="<?php echo $proname;?>" />
					</div>
					<?php
				} ?>
					<div class="clearfix"></div>
				</div>
		   </div>
		   <div class="clearfix"></div>
		</div>
		<div class="new-arrivals text-center">
			
			
			<div class="col-md-3 product-item">
				<a id="books" name="overall/books.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)"><img src="img/books.jpeg" class="img-responsive" width="200px" height="200px" alt="" /></a>
				<h3>Books</h3>
				<a id="books" name="overall/books.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">Shop Now<i class="go"></i></a>
			</div>
			<div class="col-md-3 product-item">
				<a id="gadgets" name="overall/gadgets.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)"><img src="img/gadget.jpg" class="img-responsive zoom-img"  width="200px" height="200px" alt="" /></a>
				<h3>Gadgets</h3>
				<a id="gadgets" name="overall/gadgets.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">Shop Now<i class="go"></i></a>
			</div>
			<div class="col-md-3 product-item">
				<a id="gadgets" name="overall/arts.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)"><img src="img/arts.jpg" class="img-responsive zoom-img"  width="200px" height="200px" alt="" /></a>
				<h3>Arts</h3>
				<a id="gadgets" name="overall/arts.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">Shop Now<i class="go"></i></a>
			</div>
			<div class="col-md-3 product-item">
				<a id="other" name="overall/others.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)"><img src="img/others.jpeg" class="img-responsive zoom-img"  width="200px" height="200px" alt="" /></a>
				<h3>Other</h3>
				<a id="books" name="overall/others.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)">Shop Now<i class="go"></i></a>
			</div>
			<div class="clearfix"></div>
		</div>
		
	  </div>
	  </div>
	  <!-- Login Box Starts Here -->
	  <div id="vpb_pop_up_background"></div>
<div id="vpb_login_pop_up_box" class="vpb_signup_pop_up_box">
<table class="notices"  width="100%">
<tr id="subject" style="text-align:center;max-width:400px;"><td colspan="3" >STUDENT LOGIN</td></tr>
<tr id="description"  style="text-align:center;width:100%;border-left:1px dotted #999999;border-right:1px dotted #999999;"><td>University ID</td><td>:</td><td><input type="text" id="stuid"  placeholder="ex : 16BCE0988" class="vpb_textAreaBoxInputs"></td></tr>
<tr id="description"  style="text-align:center;:100%;border-left:1px dotted #999999;border-right:1px dotted #999999;"><td>Password</td><td>:</td><td><input type="password" id="stupasswd"  placeholder="ex : xxxxx" class="vpb_textAreaBoxInputs"></td></tr>
<tr class="details"><td  colspan="2"> <span id="login_status"></span></td><td><input class="botton" type="button" value="Login" onclick="login()"></td></tr>
</table>

</div>
<div id="userpro" class="vpb_signup_pop_up_box">
	<div id='pra'></div>
</div>

<br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all">
</div>

	 <div class="footer">
		<div class="wrap">
			
			<div class="footer-middle">
				<div class="col-md-12 about-text text-right">
					<h4>About VIT online selling and buying website</h4>
					<p>This site helps vit students to sell and buy thier old items and by items i mean anything no limitation. beacause remember what may not be uselful to you can be very important to somebody. Any querry or problem related to  this website you can  mail me  at "anshumansingh.2016@vitstudent.ac.in
					THANK YOU HAPPY TO HELP PEACE</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="copyright text-center">
				<p>Copyright &copy; 2018 All rights reserved | Designed  by  <a style="cursor:pointer;" onclick="load_page('tracebook.php')">  Anshuman</a></p>
			</div>

		</div>
	 </div>
</body>
</html>
