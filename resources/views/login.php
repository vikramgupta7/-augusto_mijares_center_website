<?php 

// echo $_SERVER['SCRIPT_FILENAME'];

include("config/db_connect.php");

if(isset($_POST['submit']))
{
	// print_r($_POST);
	$error = '';

	$sql = "SELECT * FROM users WHERE user_email = '" . $_POST['email'] . ''. "';"; 
	// print_r($sql);
	if(!mysqli_query($connection, $sql))
	{
		echo 'DB query failed:' . mysqli_error($connection);
	}
	else
	{
		// get the result.
		$result = mysqli_query($connection, $sql);
		//feth result in array format.
		$users = mysqli_fetch_assoc($result);
		// print_r($users);

		if(!$users)
		{
			// echo 'NO USER FOUND';
			$error = 'No such user found';
		}
		elseif ($users['user_password'] == $_POST['pass'])
		{
			//cookies for login
			// echo "chal raha hai dada";
			setcookie("typeofuser", $users['user_role'], time() + 600);
			setcookie("user_name", $users['user_name'], time() + 600);
			$_COOKIE['typeofuser'] = $users['user_role'];
			$_COOKIE['user_name'] = $users['user_name'];
			session_start();
			$_SESSION['typeofuser'] = $users['user_role'];
			$_SESSION['user_name'] = $users['user_name'];
			// print_r($_COOKIE['user_name']);
			// echo "chal raha hai dada2";
			// print_r($_COOKIE);
			// print_r($_SESSION);
			if($_SESSION['typeofuser'] == 'admin')
			{
				// echo "chal raha hai dada3";
				echo "<script>location.href='admin/projects.php';</script>";
				// header('Location:admin/projects.php');
				// exit();
			}
			if($_SESSION['typeofuser'] == 'user')	
			{
				echo "<script>location.href='index.php';</script>";
				// header('Location:index.php');
				// exit();
			}

		}
		else
		{
			// echo 'WRONG PASSWORD';
			$error = 'Wrong Credentials';
		}


	}

	mysqli_free_result($result);
	mysqli_close($connection);

	
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="mijares.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet"> <!-- Font for the navigation bar -->
	<link href="https://fonts.googleapis.com/css?family=Rajdhani:700&display=swap" rel="stylesheet">
	<title>TEST</title>
</head>
<body>

	<div class="login">
		<div id="top">
			<p>
				<img src="images/logo.png" alt="Augusto Mijares Center">
				<h2>
				SOMOS UN EQUIPO INTERDISCIPLINARIO
				</h2>
				<h3>Iniciar Sesion</h3>
			</p>
		</div>

		
		<div id="form">
			<p>
				<form action="login.php" method="POST">
					<input type="email" id="femail" name="email" placeholder="Nombre de Usuario o Correo" required="required">
					<input type="password" id="fpass" name="pass" placeholder="Contrasena" required="required">
					<br>
					<button type="submit" name="submit" value="submit" class ="button">Entrar</button>
					<p class="red_text">
						<?php if(isset($error)) echo $error; ?>
						
					</p>
				</form>
			</p>
		</div>
	</div>

</body>

</html>