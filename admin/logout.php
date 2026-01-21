<?php
	if(!session_start()) session_start();
	unset($_SESSION['admin_username']);
	unset($_SESSION['admin_password']);
	header("location:login.php");
?>