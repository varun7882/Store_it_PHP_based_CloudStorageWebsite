<!DOCTYPE html>
<html>
	<head>
	<title>shared_data</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/main4.css">	
		<link rel="stylesheet" type="text/css" href="../css/shmain.css">	
	</head>
	<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../js/ajax_del.js"></script>
	<body>
	<?php 
		session_start();
		require("../databaseconnection.php");
		$u=$_SESSION["logged_in"];
		$uid=$_SESSION["table"];
		if(isset($_POST["logout"]))
			{
				session_destroy();
				header("Location: ../login/homepage.php");
			}
			//header("Content-Type: text/javascript; charset=utf-8");
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
		<script type = "text/javascript" >
    	history.pushState(null, null, 'shareddata.php');
  		window.addEventListener('popstate', function(event) {
  			alert("press home to go back");
   		history.pushState(null, null, 'shareddata.php');
   		 });

    </script>

		<?php
			
			if(!isset($_SESSION["logged_in"]))
			{
				header("Location: ../login/login.php");
			}
			if(isset($_POST["Home"]))
			{
				header("Location: ../login/homepage.php");
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
					
				    header("Location: shareddata.php");
					$message = "your media has been uploaded";
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
					
					header("Location: p_docs.php");
					$message = "your media has been uploaded";
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
					echo 'alert("your media has not been uploaded\:too large file or incomprehensiable format");';
					echo '</script>';
					
					header("Location: ../login/homepage.php");
					
					}
			
					
			}
		?>

		<div style="padding-left:10px;">
			<div id="">
				<?php 
					$sql2="select count(media) from $uid";
					 $n=mysqli_query($db,$sql2);
					 $n=mysqli_fetch_array($n);
					 $c=$n["0"];
					 $sqlimg="select * from shared where path like '%/images/%'";
					 $sqlmus="select * from shared where path like '%/music/%'";
					 $sqlvid="select * from shared where path like '%/videos/%'";
					 $sqldocs="select * from shared where path like '%/docs/%'";
					 $resimg=mysqli_query($db,$sqlimg);
					 $resmus=mysqli_query($db,$sqlmus);
					 $resvid=mysqli_query($db,$sqlvid);
					 $resdocs=mysqli_query($db,$sqldocs);
					 while($q=mysqli_fetch_assoc($resimg))
					 {				 
					 $img=$q["media"];
					 $user=$q["sharedby"];
					 $path=$q["path"];
					?>	
					<div class="sharedimgbox" id="<?php echo $img ?>" >
						<div class="sharedimg" >
						<?php echo "<img src='$path' class='img'>"; ?>
						<div class="shtitle">
						<?php  echo "<p align='center'>$img</p>" ?>
						</div>
						</div>																											
						<div class="shlinks">
						 <p>
					<a  href='<?php echo $path ?>'  download>
						<div class="shdbuttons">
						 		DOWNLOAD
						 	</div>
						 	</a> 
						 	<a  href='<?php echo $path ?>' target="_blank" >
						 	<div  class="shdbuttons">
						 		VIEW
						 	</div>
						 </a>
						 </p>
						</div>
						<div class="user">
                        <p style=" color:#5CD9B1;font-size:28px;">shared by--</p>
                         <br><p align='center' style="margin-top:-35px;font-size:23px;color:#BA3227;"> <i><?php echo $user ?></i></p>
						</div>
					</div>
				
					<?php }

            while($q=mysqli_fetch_assoc($resmus))
					 {				 
					 $img=$q["media"];
					 $user=$q["sharedby"];
					 $path=$q["path"];
					?>	
					<div class="sharedimgbox" id="<?php echo $img ?>" >
						<div class="sharedimg" >
						<?php echo "<img src='../images/audio.jpg' class='img'>"; ?>
						<div class="shtitle">
						<?php  echo "<p align='center'>$img</p>" ?>
						</div>
						</div>																											
						<div class="shlinks">
						 <p>
					<a  href='<?php echo $path ?>'  download>
						<div class="shdbuttons">
						 		DOWNLOAD
						 	</div>
						 	</a> 
						 	<a  href='<?php echo $path ?>' target="_blank" >
						 	<div  class="shdbuttons">
						 		VIEW
						 	</div>
						 </a>
						 </p>
						</div>
						<div class="user">
                        <p style=" color:#5CD9B1;font-size:28px;">shared by--</p>
                         <br><p align='center' style="margin-top:-35px;font-size:23px;color:#BA3227;"> <i><?php echo $user ?></i></p>
						</div>
					</div>
				
					<?php }
					while($q=mysqli_fetch_assoc($resvid))
					 {				 
					 $img=$q["media"];
					 $user=$q["sharedby"];
					 $path=$q["path"];
					?>	
					<div class="sharedimgbox" id="<?php echo $img ?>" >
						<div class="sharedimg" >
						<?php echo "<img src='../images/thumb.png' class='img'>"; ?>
						<div class="shtitle">
						<?php  echo "<p align='center'>$img</p>" ?>
						</div>
						</div>																											
						<div class="shlinks">
						 <p>
					<a  href='<?php echo $path ?>'  download>
						<div class="shdbuttons">
						 		DOWNLOAD
						 	</div>
						 	</a> 
						 	<a  href='<?php echo $path ?>' target="_blank" >
						 	<div  class="shdbuttons">
						 		VIEW
						 	</div>
						 </a>
						 </p>
						</div>
						<div class="user">
                        <p style=" color:#5CD9B1;font-size:28px;">shared by--</p>
                         <br><p align='center' style="margin-top:-35px;font-size:23px;color:#BA3227;"> <i><?php echo $user ?></i></p>
						</div>
					</div>
					<?php } ?>
					<?php 
					while($q=mysqli_fetch_assoc($resdocs))
					 {				 
					 $img=$q["media"];
					 $user=$q["sharedby"];
					 $path=$q["path"];
					?>	
					<div class="sharedimgbox" id="<?php echo $img ?>" >
						<div class="sharedimg" >
						<?php if(preg_match("/^[\w\d0-9\W]+.pdf$/", $img))
						{  
						 ?>
						<img src='../images/Adobe.png' class='img'>
						<?php } else { ?>
						<img src='../images/officeicon.jpg' class='img'>
						<?php } ?>
						<div class="shtitle">
						<?php  echo "<p align='center'>$img</p>" ?>
						</div>
						</div>																											
						<div class="shlinks">
						 <p>
					<a  href='<?php echo $path ?>'  download>
						<div class="shdbuttons">
						 		DOWNLOAD
						 	</div>
						 	</a> 
						 	<a  href='<?php echo $path ?>' target="_blank" >
						 	<div  class="shdbuttons">
						 		VIEW
						 	</div>
						 </a>
						 </p>
						</div>
						<div class="user">
                        <p style=" color:#5CD9B1;font-size:28px;">shared by--</p>
                         <br><p align='center' style="margin-top:-35px;font-size:23px;color:#BA3227;"> <i><?php echo $user ?></i></p>
						</div>
					</div>
					<?php } ?>
				 
                 </div>
					
			<div id="upload">
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
				  <div>
					<form method="post" action=""  >
						<input type="submit" name="logout" class="b" id="bimg2" value="log out">
					</form>
				</div>
		    </div>	
	</body>
</html>
