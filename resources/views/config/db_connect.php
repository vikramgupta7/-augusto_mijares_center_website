<?php 

	//connect to DB
	$connection = mysqli_connect('localhost:3307', 'vikram', 'Vikram777#', 'database');

	//check connection
	if(!$connection)
	{
		echo 'ERROR = ' . mysqli_connect_error();
	}

	$connection->set_charset("utf8");
	
 ?>