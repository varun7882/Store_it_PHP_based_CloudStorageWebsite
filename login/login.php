<!DOCTYPE html>
<html>
	<head>
		<title>login_page</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	</head>
	<body>
			<?php
					session_start();
					if(isset($_SESSION["logged_in"]))
					{
						header("Location: homepage.php");
					}
					if(isset($_SESSION["error"]))
					{
						echo '<script type="text/Javascript">';
						echo 'alert("login unsuccessful:Incorrect password or Username!!!")';
						echo '</script>';
						session_destroy();
					}
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
		<div id="loginmid">
			<div id="text">
			<div style="font-size:30px;">A perfect online storage for you.</div><br>
			All your data is safe with us.:)
			</div>
			<div id="pic1">
			<image src="../images/pic1.png" width="700" height="380">
			</div>
			<div id="sign_up">
			New to "STORE IT" <br/>sign up now...	
			</div>
			<div id="log">
				<div align="center" id="heading"><image src="../images/login.jpg" width="150px" height="70"></div>
				<div id="tags">
				<div style="float:left"><image src="../images/register_user.png" width="30px" height="30">
				</div>
			    <div style="float:left">User Name</div>
				<br><br>
				<div style="float:left">
				<image src="../images/lockandkey.png" width="40" height="40" >
				</div>
				<div style="float:left">
				Password
				</div>
				
				</div>
				<div id="fortags">
					<form method="post" action="loginvalidator.php">
						:<input type="text" name="username" class="field"/><br><br>
						:<input type="password" name="userpassword" class="field"/><br>
						<input type="submit" class="b" id="b1" value="Log in">
					
					</form>
				</div>
			</div>
			<!--log in complete-->
			<form action="../sign_up/signup.php">
				<input type="submit" value="sign up" name="sign_up" class="b" id="b2">
			</form>
		</div>
	</body>
</html>
