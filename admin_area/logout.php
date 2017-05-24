<?php 
	session_start();
	
	session_destroy();
	
	// Bringing the admin to this page after log out
	echo "<script>window.open('login.php?logged_out=You have been successfully logged out!' , '_self')</script>";
?>