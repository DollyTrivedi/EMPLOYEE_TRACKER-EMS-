<?php
include ("connection.php");
session_start();

if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
	//session_destroy();
	//$_SESSION['username']="";
	header("Location:index.php");
}
else
{
	echo"on";
}
?>