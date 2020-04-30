<?php 
	setcookie('typeofuser', "null", time() + 600, "/");
	setcookie('user_name', "null", time() + 600, "/");
	// print_r($_COOKIE);
	unset($_COOKIE['typeofuser']);
	unset($_COOKIE['user_name']);
	// print_r($_COOKIE);
	// sleep(10);
	echo "<script>location.href='../../login.php';</script>";
	// header('Location:../../login.php');
 ?>