<?php
session_start();
	include("../connect.php");

if(isset($_SESSION['stuid'])) 
{
$stuid=strip_tags($_SESSION['stuid']);
$givd=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM passwords WHERE ID='$stuid'"));
$datagiven=$givd['datagiven'];
if($datagiven==1)
{
if(isset($_POST['submit'])) 
{
	//form variables
	
	$ptitle=$_POST['ptitle'];
	$pdesc=$_POST['pdesc'];
	$pbran=$_POST['pbran'];
	$pproc=$_POST['pproc'];
	$pcost=$_POST['pcost'];
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$fil=mysqli_num_rows(mysqli_query($con,"SELECT * FROM products WHERE posted_by='$stuid'"));
	
	if($fil==0)
	{
	$filec=1;
}
else
{
$filec=$fil+1;
}

	//file variables
     $filename = $_FILES['File']['name'];
     $prathapfname = $_FILES['File']['name'];

    $tmpname  = $_FILES['File']['tmp_name'];
    $filesize = $_FILES['File']['size'];
    $ftype = $_FILES['File']['type'];
    $extension=strpbrk($_FILES['File']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
	$vpb_allowed_file_extensions = array("jpg","jpeg","gif","png");
	$prathapfname=$stuid."_".$filec.".".$vpb_file_extensions;
    $fp = fopen($tmpname, 'r');
    $file = fread($fp, filesize($tmpname));
    $file = addslashes($file);
    fclose($fp);
    $uploadDir = '../products/';
		
		  if (!in_array($vpb_file_extensions, $vpb_allowed_file_extensions)) 
	{
		//Display file type error error
		echo "<script>alert('only jpg,jpeg,gif,png are allowed');window.location='../index.php';</script>";
	}
	else 
	{
			$filePath = $uploadDir . $prathapfname;
$result = move_uploaded_file($tmpname, $filePath);
if (!$result) {
echo "<script>alert('Error uploading file');</script>";
exit;
}


$query = mysqli_query($con,"INSERT INTO `products`(name,description,attachment,branchcat,procat,cost,posted_by,posted_date,postedfull,ip) VALUES ('$ptitle','$pdesc','$prathapfname','$pbran','$pproc','$pcost','$stuid',CURDATE(),NOW(),'$ip')") or die(mysqli_error());
if($query){
	$pro=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `products` WHERE attachment='$prathapfname'"));
	$pid=$pro['sno'];
	$description="Hi Users,<br> ".$stuid." Posted new product in ".$pro['procat']." for ".$pro['branchcat']." Students...Have a Look on it..";


if(mysqli_query($con,"INSERT INTO sellingnotices(nfrom,proid,description,posted_date,notice_at) VALUES ('$stuid','$pid','$description',CURDATE(),NOW())") or die(mysqli_error()))
{
    echo "<script>alert('Product ".$ptitle." added successfully');window.location='../index.php';</script>";
}
   
    }
}
}

else
{
	echo "<script>alert('Invalid');window.location='../index.php';</script>";
}
}
else
{
echo "<script>alert('Please Fill your details in edit profile section to Use this service..');window.location='../index.php';</script>";
}
}
else
{
	header("location:../index.php");
}
?>
