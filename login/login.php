<?php

//include("db.php");
//session_start();
session_start();
if(isset($_SESSION["username"])){
$ds=$_SESSION["username"];
if($ds==1){
header("Location: crud/index.php"); }
}
if(isset($_POST['username']))
{
   
	include("../db.php");

	$username=$_POST['username'];
	$password=$_POST['password'];
	echo $username.$password;
	$qaery= "SELECT * FROM login WHERE user = '". $username . "' AND pass = '". $password ."' ";
	$result=mysqli_query($conn,$qaery);
	$rows = mysqli_num_rows($result); 
	if($rows==1)
	{
		$_SESSION["username"] = 1;
		header("Location: crud/index.php");
			 }else{
		echo "<div class='form'>
	<h3>نام کاربری یا رمز عبور شما اشتباه است</h3>
	<br/>برای ورود روی <a href='login.php'>اینجا</a> کلیک کنید</div>";
		}
		}

	?>
<html>
<head></head>
<body>
		<h3>ورود</h1>
		<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="نام کاربری" required />
			<input type="password" name="password" placeholder="رمز عبور" required />
			<input name="submit" type="submit" value="ورود" />
		</form>
</body>
</html>