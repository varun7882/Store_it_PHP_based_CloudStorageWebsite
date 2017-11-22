<!DOCTYPE html>
<html>
	<head>
		<title>home_Page</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/main3.css">
	</head>
	<body>
		<?php
			session_start();
			require("databaseconnection.php");
			if(!isset($_SESSION["logged_in"]))
			{
					header("Location: ../login/login.php");
			}
			if(isset($_POST["logout"]))
			{
				session_destroy();
				header("Location: login.php");
			}
			$x=$_SESSION["logged_in"];
			$xp=$_SESSION["dp"];
			$sql1="select UID from logintable where usernames='$x'";
			$res=mysqli_query($db,$sql1) or die("something went wrong!");
			$res=mysqli_fetch_assoc($res);
			$_SESSION["table"]=$res["UID"];
		?>
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
		<div id="mid" >
			<div style="margin:15px auto;font-size:35px;font-family:sans-serif;" align="center">WELCOME</div>
			<div><p align="center"><?php echo "<img src=\"../uploads/$x/$xp\" width=\"100\" height=\"100\">"; ?></p></div>
			<?php
				echo "<div align='center' style='font-family:monotype corsiva;font-size:30px;'>".$_SESSION["logged_in"]."</div>";
			?>
			
			<a href="../p_img.php">
			<div class="box">
			<img src="../images/img.png" width="300" height="180" >
			<p style="margin:-3px auto;" align="center">Images</p>
			</div></a>
			<a href="../p_audio.php"><div class="box">
				<img src="../images/audio.png" width="300" height="180" >
			<p style="margin:-3px auto;" align="center">Audio</p>
			</div></a>
			<a href="../p_docs.php">
			<div class="box">
				<img src="../images/docsicos.jpg" width="300" height="180" >
			<p style="margin:-3px auto;" align="center">docs</p>
			</div>
			</a>
			<a href="../p_video.php">
			<div class="box">
				<img src="../images/videos.png" width="300" height="180" >
			<p style="margin:-3px auto;" align="center">videos</p>
			</div>
			</a>
			<a href="../multiupload.php">
			<div class="box">
				<img src="../images/upload.png" align="center" style="margin-left:50px;"width="200" height="180" >
			<p style="margin:-3px auto;" align="center">upload data</p>
			</div>
			</a>
			<a href="../shared/shareddata.php">
			<div class="box">
				<img src="../images/sharingtrends.png" width="300" height="180" >
			<p style="margin:-3px auto;" align="center">shared data</p>
			</div>
			</a>
			<form method="post" action="">
			<input type="submit" name="logout" style="margin-top:"class="b" id="bh1" value="log out">
			</form>
		</div>
	</body>
</html>