<!DOCTYPE html>
<html>
	<head>
	<title>IMAGES</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main4.css">	
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
    	history.pushState(null, null, 'p_img.php');
  		window.addEventListener('popstate', function(event) {
  			alert("press home to go back");
   		history.pushState(null, null, 'p_img.php');
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
				
				$pic=$_FILES["up"]["name"];
				$type=$_FILES["up"]["type"];
				if(($type=='image/jpeg')||($type=='image/jpg')||($type=='image/bmp')||($type=='image/png'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"],"uploads/".$u."/images/".$_FILES["up"]["name"]);
					$media="image";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{ 
					$message = "your $media has been uploaded";
				header("Location: p_img.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else if(($type=='audio/mp3')||($type=='audio/aac'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"],"uploads/".$u."/music/".$_FILES["up"]["name"]);
					$media="media";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{
					$message = "your $media has been uploaded";
					header("Location: p_audio.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else if(($type=='application/msword')||($type=='application/pdf')||($type=='application/octet-stream')||($type=='text/plain'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"],"uploads/".$u."/docs/".$_FILES["up"]["name"]);
					$media="document";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{
					$message = "your $media has been uploaded";
					header("Location: p_docs.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else if(($type=='video/mp4')||($type=='video/avi'))
				{
					move_uploaded_file($_FILES["up"]["tmp_name"],"uploads/".$u."/videos/".$_FILES["up"]["name"]);
					$media="media";
					$sql1="insert into $uid(media,type) value('$pic','$type')";
					if($check=mysqli_query($db,$sql1))
					{
					$message = "your $media has been uploaded";
					header("Location: p_video.php");
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
				else

				{
					echo '<script language="javascript">';
					echo 'alert("your media has not been uploaded\:too large file or incomprehensiable format")';
					echo '</script>';
					header("Location: login/homepage.php");
					}
			
					
			}
		?>

		<div id="mid">
			<div id="imgcontainer">
				<?php 
					$sql2="select count(media) from $uid";
					 $n=mysqli_query($db,$sql2);
					 $n=mysqli_fetch_array($n);
					 $c=$n["0"];
					 $sql3="select media from $uid where type='image/jpg' or type='image/bmp' or type='image/jpeg' or type='image/png'";
					 $res=mysqli_query($db,$sql3);
					 while($q=mysqli_fetch_assoc($res))
					 {				 
					 $img=$q["media"];
					?>	
					<div class="imgbox" id="<?php echo $img ?>" >
						<div class="img" >
						<?php echo "<img src='uploads/$u/images/$img' class='img'>"; ?>
						</div>																																															
						<div class="title">
						<?php  echo "<p align='center'>$img</p>" ?>
						</div>
						<div id="links">
						 <p align="center">
					<a  href='<?php echo "uploads/$u/images/$img" ?>'  download>
						<div class="dbuttons">
						 		DOWNLOAD
						 	</div>
						 	</a> 
						 	<a  href='<?php echo "uploads/$u/images/$img" ?>' target="_blank" >
						 	<div  class="dbuttons">
						 		VIEW
						 	</div>
						 </a>
						 	<div class="dbuttons" id='<?php echo "uploads/$u/images/$img" ?>' onClick='del(this.id,"<?php echo $img ?>","<?php echo $uid ?>")'>
						 		DELETE
						 	</div>
						 	<div class="dbuttons" id='<?php echo "/uploads/$u/images/$img" ?>' onClick='share(this.id,"<?php echo $img ?>","<?php echo $u ?>")'>
						 		SHARE
						 	</div>
						 </p>
						</div>
					</div>
				
					<?php }
				 ?>
   

					 
					 
			</div>
					
			<div id="upload">
			    <div>
					<form method="post" action=""  >
						<input type="submit" name="logout" class="b" id="bimg2" value="log out">
					</form>
				</div>
				<div  class="up">
					<form method="post" action="" enctype="multipart/form-data">
					    UPLOAD DATA HERE&nbsp : <input type="file" name="up" >
						<br><input type="submit" name="upload" value="Upload" class="b" id="bimg1" >
					</form>
				</div>
				<div class="home">
					<form method="post" action="">
						<input type="submit" class="b" id="bimg3" value="Home" name="Home">
					</form>
				</div>
		    </div>	
	</body>
</html>
