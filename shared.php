<?php
$path=$_GET["q"];
$media=$_GET["n"];
$user=$_GET["u"];
require("databaseconnection.php");
$sql="insert into shared values('$media','$user','$path');";
if($res=mysqli_query($db,$sql))
{
	echo "your media has been shared";
}
else
{
	echo "bitch";
}
?>