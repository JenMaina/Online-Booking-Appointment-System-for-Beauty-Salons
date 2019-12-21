<?php
session_start();
	if(isset($_SESSION['mgrid'])){ // destrot sessions from customer
	unset($_SESSION['username']);
	unset($_SESSION['mgrname']);
	unset($_SESSION['mgrid']);
	echo ("<script>location.href = 'index.php';</script>");// Redirecting To Home Page
	}
?>