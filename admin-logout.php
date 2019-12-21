<?php
session_start();
	if(isset($_SESSION['username'])){ // destrot sessions from customer
	unset($_SESSION['username']);
	echo ("<script>location.href = 'index.php';</script>"); // Redirecting To Home Page
	}
?>