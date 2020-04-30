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
				<form action="login" method="POST">
				@csrf
					<input type="email" id="femail" name="email" placeholder="Nombre de Usuario o Correo" required="required">
					<input type="password" id="fpass" name="pass" placeholder="Contrasena" required="required">
					<br>
					<button type="submit" name="submit" value="submit" class ="button">Entrar</button>
					<p class="red_text">
						<!-- errror -->
						
					</p>
				</form>
			</p>
		</div>
	</div>

</body>

</html>