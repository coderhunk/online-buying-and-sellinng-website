<?php
include "connect.php"; //Database Connection

if(isset($_POST['suggested_names']) && !empty($_POST['suggested_names']))
{
	$search_term = strip_tags($_POST['suggested_names']);
	$check_for_search_term = mysqli_query($con,"select * from `products` where `name` like '%".mysqli_real_escape_string($con,$search_term)."%' order by `sno` desc");
	
	if(mysqli_num_rows($check_for_search_term) > 0)
	{
		while($getSearchResults = mysqli_fetch_array($check_for_search_term))
		{
			?>
			
			
			<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3><span style='font-size:12px;'>Search Results for </span><?php echo $search_term;?></h3>
    		</div>
    		
    		
    		
    		<div class="clearfix"></div>
    	</div>
	      <div class="section group">
			  
				<div class="grid_1_of_4 images_1_of_4">
					 <a  style="cursor:pointer;" onclick=showproduct("<?php echo $getSearchResults['sno'];?>")><img src="products/<?php echo $getSearchResults['attachment'];?>" width="200px" height="200px"/></a>
					<?php 
					if($getSearchResults['posted_date']==$today)
					{
						?> <div class="discount">
					 <span class="percentage">New</span>
					</div>
					<?php } ?>
					<h2><?php echo$getSearchResults['name'];?> </h2>
					 <p>by <?php echo $getSearchResults['posted_by'];?></p>
					 <p><span class="price">Rs <?php echo $getSearchResults['cost'];?> /-</span></p>
				     <center><div class="button"><span><a style="cursor:pointer;" onclick=showproduct("<?php echo $getSearchResults['sno'];?>") class="details">Details</a></span></div></center>
				     <center><div class="button"><span><a style="cursor:pointer;" onclick=showproduct("<?php echo $getSearchResults['sno'];?>") class="details">Add to cart</a></span></div></center>
				</div>
				<?php
			
			}?>
				<div class="clearfix"></div>
			</div>
			<br><br><br>
		
		</div>
	</div>
		
		</div>
	</div>
	

<?php
		
	}
	else
	{
		echo "<div class='info'>No result was found...</div>";
	}
}
?>
