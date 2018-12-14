<?php
session_start();
require_once("../connect.php");
$today=date("Y-m-d");
?>
<script src="../iiitolx.js"></script>
<script>
</script>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>OTHERS</h3><h6>ALL</h6>
    		</div>
    		
    		
    		<div class="page-no"><ul>
    				<li>[<a id="allgad" name="overall/books.php" style="cursor:pointer;" onclick="load_page(this.name,this.id)"> show more>>></a >]</li>
    				</ul></p>
    		</div>
    		<div class="clearfix"></div>
    	</div>
	      <div class="section group">
			  <?php 
			 
			  $books=mysqli_query($con,"SELECT * FROM products WHERE visibility='1' && procat='Others' ORDER BY sno DESC");
			  if(mysqli_num_rows($books)<1)
			  {
				  
				  echo "<center><h3>There are nothing in the cart in this category</h3></center>";
			  }
			  else
			  {
			  while($booksd=mysqli_fetch_array($books))
			  {
				  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a  style="cursor:pointer;" onclick=showproduct("<?php echo $booksd['sno'];?>")><img src="products/<?php echo $booksd['attachment'];?>" width="200px" height="200px"/></a>
					<?php 
					if($booksd['posted_date']==$today)
					{
						?> <div class="discount">
					 <span class="percentage">New</span>
					</div>
					<?php } ?>
					<h2><?php echo $booksd['name'];?> </h2>
					 <p>by <?php echo $booksd['posted_by'];?></p>
					 <p><span class="price">Rs <?php echo $booksd['cost'];?> /-</span></p>
				     <center><div class="button"><span><a style="cursor:pointer;" onclick=showproduct("<?php echo $booksd['sno'];?>") class="details">Details</a></span></div></center>
				     <center><div class="button"><span><a style="cursor:pointer;" onclick=showproduct("<?php echo $booksd['sno'];?>") class="details">Add to cart</a></span></div></center>
				</div>
				<?php
			} 
			}?>
				<div class="clearfix"></div>
			</div>
			<br><br><br>
		
		</div>
	</div>
		
		</div>
	</div>
	
