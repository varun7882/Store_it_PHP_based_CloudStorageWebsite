<?php
	require("databaseconnection.php");
	$fname=$_POST["fn"];
	$lname=$_POST["ln"];
	$uname=$_POST["un"];
	$pass=$_POST["pass"];
	$mail=$_POST["email"];
	$phno=$_POST["mob"];
	$dp=$_FILES["dp"]["name"];
	$type=$_FILES["dp"]["type"];
	$f=false;
	$UID=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0987654321"),0,5);
	$ins="insert into logintable values('$UID','$uname','$pass','$fname','$lname','$mail','$phno','$dp')";
	$mktable="create table $UID(media varchar(500),type varchar(50))";
	mkdir("../uploads/$uname");
	mkdir("../uploads/$uname/images");
	mkdir("../uploads/$uname/videos");
	mkdir("../uploads/$uname/docs");
	mkdir("../uploads/$uname/music");
	if(($type=='image/jpg')||($type=='image/jpeg')||($type=='image/png')||($type=='image/bmp'))
	{
	move_uploaded_file($_FILES["dp"]["tmp_name"],"../uploads/$uname/".$_FILES["dp"]["name"]);
	$f=true;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>store it</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/main2.css">
	</head>
	<body>
			<header>
				<div id="hmatter">
					<div id="logo">
					<image src="../images/store.png">
					</div>
					<div id="con">
					&#9742;Contact Us:9454692381
					</div>
				</div>
			</header>
			<div style="margin:50px auto; font-size:20px;">
			<?php
				if(mysqli_query($db,$ins)&&mysqli_query($db,$mktable)&&($f))
	{
		mail($mail,"your user name and password","your username is $uname and password is $pass");
		echo '<p align="center">YOU HAVE SUCCESSFULLY REGISTERED!!!<br>your username and password has been mailed to you.</p>';
	}
	else
	{
		echo 'something went wrong!!!';
		if(!$f)
		{
			echo "please upload an image as your dp with an extension '.jpg','.jpeg','.png' or '.bmp'";
		}
	}
			?>
			<p align="center">
			<a  href="../login/login.php" style="text-decoration:none;">
			<input type="button" name="signup" value="log in" class="b" id="bs2">
			</a>
			</p>
		</div>
	</body>
</html>