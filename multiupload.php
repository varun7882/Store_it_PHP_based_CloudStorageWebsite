<!DOCTYPE html>
<html>
	<head>
	<title>UPLOAD</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main3.css">
	<link rel="stylesheet" type="text/css" href="css/mainmulti.css">	

	</head>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/ajax_del.js"></script>
	<body>
	<?php 
		session_start();
		require("databaseconnection.php");
		$u=$_SESSION["logged_in"];
		$uid=$_SESSION["table"];
		if(isset($_POST["logout"]))
			{
				session_destroy();
				header("Location: login/homepage.php");
			}
			//header("Content-Type: text/javascript; charset=utf-8");
	?>
		 	<header>
				<div id="hmatter">
					<div id="logo">
				 	<image src="images/store.png">
					</div>
					<div id="con">
					&#9742;Contact Us:9454692381
					</div>
				</div>
		</header>
		<script type = "text/javascript" >
    	history.pushState(null, null, 'multiupload.php');
  		window.addEventListener('popstate', function(event) {
  			alert("press home to go back");
   		history.pushState(null, null, 'multiupload.php');
   		 });

    </script>

		<?php
			
			if(!isset($_SESSION["logged_in"]))
			{
				header("Location: ../login/login.php");
			}
			if(isset($_POST["Home"]))
			{
				header("Location: login/homepage.php");
			}
			if(isset($_POST["upload"]))
			{
				for($i=0;$i<5;$i++)
			   {
				
				$pic=$_FILES["up"]["name"][$i];
				$type=$_FILES["up"]["type"][$i];
				if(($type=='image/jpeg')||($type=='image/jpg')||($type=='image/bmp')||($type=='image/png'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"][$i],"uploads/".$u."/images/".$_FILES["up"]["name"][$i]);
					$media="image";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{ 
					$message = "your $media has been uploaded";
				header("Location: multiupload.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else if(($type=='audio/mp3')||($type=='audio/aac'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"][$i],"uploads/".$u."/music/".$_FILES["up"]["name"][$i]);
					$media="media";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{
					$message = "your $media has been uploaded";
					header("Location: multiupload.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else if(($type=='application/msword')||($type=='application/pdf')||($type=='application/octet-stream')||($type=='text/plain'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"][$i],"uploads/".$u."/docs/".$_FILES["up"]["name"][$i]);
					$media="document";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{
					$message = "your $media has been uploaded";
					header("Location: multiupload.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else if(($type=='video/mp4')||($type=='video/avi')||($type=='video/mkv')||($type=='video/3gp'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"][$i],"uploads/".$u."/videos/".$_FILES["up"]["name"][$i]);
					$media="media";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{
					$message = "your $media has been uploaded";
					header("Location: multiupload.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else

				{
					echo '<script>';
					echo "alert('your media has not been uploaded\:too large file or incomprehensiable format');";
					echo '</script>';
					header("Location: login/homepage.php");
					}
			
				}	
			}
		?>

		<div id="mid" style="">
			<div id="uploadbox" >
			<form enctype="multipart/form-data" method="post" action="">
			<div class="upld" ><input type="file" name="up[]" multiple="multiple" ></br></div>	
			<div class="upld" ><input type="file" name="up[]" multiple="multiple" ></br></div>
			<div class="upld" ><input type="file" name="up[]" multiple="multiple" ></br></div>
			<div class="upld" ><input type="file" name="up[]" multiple="multiple" ></br></div>
			<div class="upld" ><input type="file" name="up[]" multiple="multiple" ></br></div>
			<input type="submit" name="Home" value="Home" class="b" >
			<input type="submit" name="upload" value="upload" class="b" >
		 </form>	
   			
			</div>
			 <form method="post" action="">
			<input type="submit" name="logout" class="b" id="bh1" value="log out">
			</form>	
		</div>	
			
					
			
	</body>
</html>
