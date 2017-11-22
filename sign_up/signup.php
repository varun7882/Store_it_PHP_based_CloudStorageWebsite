<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>sign up</title>
		<link rel="stylesheet" type="text/css" href="../css/main2.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
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
		<div id="midget">
			<span style="font-size:80px;font-family:Bradley Hand ITC;margin-left:420px;color:black;" >SIGN UP</span>
			<div id="midmidget">	
				<div id="tag">
					<span id="name">&nbsp;FIRST NAME&nbsp; : &nbsp; </span><br>
					<span id="fname">&nbsp;LAST NAME&nbsp; : &nbsp; </span><br>
					<span id="uname">&nbsp;USERNAME&nbsp;: &nbsp; </span><br>
					<span id="pass">&nbsp;PASSWORD&nbsp; : &nbsp; </span><br>
					<span id="email">&nbsp;EMAIL&nbsp; : &nbsp; </span><br>
					<span id="phno">&nbsp;PHONE NO.&nbsp; : &nbsp; </span><br>
					<span id="uname">&nbsp;UPLOAD YOUR PIC&nbsp;: &nbsp; </span><br>
				</div>
					<form name="entries" action="signupbackend.php" method="post" enctype="multipart/form-data">
						<div id="fill">
						<input type="text" name="fn" class="field" required><br>
						<input type="text" name="ln" class="field"   ><br> 
						<input type="text" name="un" class="field"  required ><br>
						<input type="password" name="pass" class="field"  required ><br>
						<input type="email" name="email" class="field"  required ><br>
						<input type="text" name="mob" class="field"  required ><br>
						<input type="file" name="dp" class="field"  required ><br>
						</div>
						<div id="buttons">
					    <input type="reset" value="RESET" class="b" id="bs1" >
					    <input type="submit" value="SUBMIT" class="b" id="bs2">
						</div>
					</form>
					<a href="../login/login.php">
						login
					</a>
		</div>
	</div>	
	</body>
</html>
