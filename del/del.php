<?php
$q= $_GET["q"];
$n=$_GET["n"];
$t=$_GET["t"];
require("..\databaseconnection.php");
unlink($q);
$sqldel="delete from $t where media='$n'";
if($ch=mysqli_query($db,$sqldel))
					{ 
					$message = "your media has been deleted";
					echo $message;
					}
					else
					{
						echo "$n and $t";
					}
?>