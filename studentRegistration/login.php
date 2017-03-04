<?php
	
	session_start(); 
	$username=($_POST['username']);
	$password=($_POST['password']);
	
	if($username === "username" && $password === "password") {
		$_SESSION['valid'] = true;
		header("location:logged.php");
	}else {
		$_SESSION['valid'] = false;
		header("location:index.php");	
	}
	
?>