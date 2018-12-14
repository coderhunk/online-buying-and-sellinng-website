<?php

//<!--Start session-->

session_start();

include('connect.php');
$name=$_POST["name"];
$gender=$_POST["gender"];
$branch=$_POST["branch"];
$dorm=$_POST["dorm"];
$year=$_POST["year"];
$mobile=$_POST["mobile"];
$email=$_POST["email"];
$reg_no=$_POST["reg-no"];
$password=$_POST["password"];

$apl = "SELECT * FROM userdata where stuid= '$reg_no'";
$pes = mysqli_query($con,$apl);
$sql = "SELECT * FROM userdata where email= '$email'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	echo"<body><h1>This e-mail is already registered, try with different e-mail!</h1><h2>click <a href='register.html'>here</a> to go to register page</h2></body>";
}
else{
	if(mysqli_num_rows($pes)>0){
	echo"<body><h1>This reg-no is already registered, try with different UNIVERSITY ID!</h1><h2>click <a href='register.html'>here</a> to go to register page</h2></body>";
}
else{

$sqla="INSERT INTO  userdata(`stuid`, `name`, `gender`, `branch`, `dorm`, `year`, `mobile`, `email`) VALUES ('$reg_no','$name','$gender','$branch','$dorm','$year','$mobile', '$email')";
$result = mysqli_query($con, $sqla);
$sql="INSERT INTO passwords( `ID`, `Password`) VALUES ('$reg_no','$password')";
$result = mysqli_query($con, $sql);
?>
<body>
<div><h1>You are registered successfully as <?php echo $reg_no; ?></h1>
<h2>click <a href="index.php">here</a> to go to home page</h2>
</div>
</body>
<?php } }?>