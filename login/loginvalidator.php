<?php
	session_start();
	require("databaseconnection.php");
	$uname=$_POST["username"];
	$pass=$_POST["userpassword"];
	$sql="select * from logintable where usernames='$uname' and passwords='$pass'";
	$res=mysqli_query($db,$sql);
	if($row=mysqli_fetch_assoc($res))
	{
		$_SESSION["logged_in"]=$row["usernames"];
		$_SESSION["dp"]=$row["dp"];
		header("Location: homepage.php");
	}
	else
	{
		$_SESSION["error"]= "error";
		header("Location: login.php");
	}
?>