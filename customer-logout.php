<?php
session_start();
	if(isset($_SESSION['crid'])){ // destrot sessions from customer
	unset($_SESSION['usernamec']);
	unset($_SESSION['user']);
	unset($_SESSION['crid']);
	echo ("<script>location.href = 'index.php';</script>"); // Redirecting To Home Page
	}
?>