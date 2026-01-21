<?php
	if(!session_start()) session_start();
	if($_SESSION['admin_username']=='' && $_SESSION['admin_password']==''){
		header('location:login.php');
	}
?>