<?php 

	include ('config/db_connect.php');

	$errors = array('name' => '', 'email' => '', 'pass' => '', 'repass'=>'', 'address'=>'');
	$name = $email = $address = '';

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];


		if(empty($_POST['name']))
			$errors['name'] = 'Name cannot be empty';
		elseif (!preg_match('/^[a-zA-Z ]{1,40}$/', $_POST['name']))
			$errors['name'] = 'Name must have only alphabets [A to Z] and be between 1 to 40 characters.';

		if(empty($_POST['email']))
			$errors['email'] = 'Email cannot be empty.';
		elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			$errors['email'] = 'Email has to be a valid email.';

		if(empty($_POST['pass']))
			$errors['pass'] = 'Password cannot be empty';
		elseif (!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', $_POST['pass'])) 
			$errors['pass'] = 'Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.';

		if(empty($_POST['repass']))
			$errors['repass'] = 'Repeat password cannot be empty';
		elseif ($_POST['pass'] != $_POST['repass']) 
			$errors['repass'] = 'Repeat password and password must be equal';

		if(empty($_POST['address']))
			$errors['address'] = 'Address cannot be empty';
		elseif (!preg_match('/^[a-zA-Z0-9\/\\-,.# ]*$/', $_POST['address']))
			$errors['address'] = 'Only A to Z and / - . , # allowed.';


		// print_r($errors);

		$name = mysqli_real_escape_string($connection, $_POST['name']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$pass = mysqli_real_escape_string($connection, $_POST['pass']);
		$repass = mysqli_real_escape_string($connection, $_POST['repass']);
		$address = mysqli_real_escape_string($connection, $_POST['address']);


		$sql = "SELECT * FROM users WHERE user_email ='$email';";
		mysqli_query($connection, $sql);
		if(mysqli_affected_rows($connection) >= 1)
			$errors['email'] = 'This email already exists';
		else
		{
			$sql = "INSERT INTO users(page_id, user_name, user_email, user_password, user_role) VALUES (9, '$name', '$email', '$pass', 'user');";
			if(!array_filter($errors))
			{
				if(!mysqli_query($connection, $sql))
				{
					echo 'DB query failed:' . mysqli_error($connection);
				}
				else
				{
					$from = "vxg4392@uta.cloud";
					$to = $email;
					$subject = "Thank you for signing up!";
					$body = "Hello " . $name . "\n" . "You've signed up for Centero Augusto Mijares";
					$headers = "From:" . $from;
					mail($to, $subject, $body);
					// print_r($body);
					sleep(2);
					header('Location:index.php');
				}
			}
		}
	}


 ?>


<script>
	var checkrepass = function() 
	{
		// alert(document.getElementById('frepass').value);
	  	if (document.getElementById('fpass').value == document.getElementById('frepass').value) 
	  	{
		    document.getElementById('frepass').style.backgroundColor = 'green';
		    // alert(document.getElementById('fpass').value);
	  	} 
	  	else 
	  	{
	    	document.getElementById('frepass').style.backgroundColor = 'red';
	    	// alert("DOES NOT MATCH");
	  	}
	}


	var checkname = function() 
	{
		const regex = RegExp('^[a-zA-Z ]{1,40}$');
		if(regex.test(document.getElementById('fname').value))
			document.getElementById('fname').style.backgroundColor = 'green';
		else
			document.getElementById('fname').style.backgroundColor = 'red';

	}

	var checkemail = function() 
	{
		const regex = RegExp('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$');
		if(regex.test(document.getElementById('fmail').value))
			document.getElementById('fmail').style.backgroundColor = 'green';
		else
			document.getElementById('fmail').style.backgroundColor = 'red';
	}

	var checkpass = function() 
	{
		const regex = RegExp('(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}');
		if(regex.test(document.getElementById('fpass').value))
			document.getElementById('fpass').style.backgroundColor = 'green';
		else
			document.getElementById('fpass').style.backgroundColor = 'red';
	}
</script>



<!DOCTYPE html>
<html>
@include("templates.head")
<body>
	@include("templates.navigation")
	<p>

	<div id="top">
		<p>
			<img class ="logo_small" src="images/logo.png" alt="Augusto Mijares Center">
			<h4>
			Registro
			</h4>
		</p>
	</div>

	<div class="grid" id="page_sign_grid1">
		<div class="form">
			<div class="red_text"> 
				<?php  
					foreach ($errors as $error)
					{
						if($error != '')
						{
							echo $error;
							echo '<br>';
						}
					}
				?>
			</div>
			<form action="signup.php" method="POST">
				<input type="text" id="fname" name="name" placeholder="Nombre de" required="required" pattern="^[a-zA-Z ]{1,40}$" title="Only alphabets [A to Z] between 1 to 40 characters." onkeyup ="checkname()" value="<?php echo $name; ?>">
				<input type="email" id="fmail" name="email" placeholder="Correo" required="required" onkeyup ="checkemail()" title="Only valid emails" value="<?php echo $email; ?>"> <!-- http://html5pattern.com/Emails --> <!-- pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" -->
				<br>
				<input type="password" id="fpass" name="pass" placeholder="Contrasena" required="required" onkeyup ="checkpass()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.">
				<input type="password" id="frepass" name="repass" placeholder="Repeter Contrasena" required="required" title="Repeat Password." onkeyup ="checkrepass()">
				<br>
				<input type="text" id="faddress" name="address" placeholder="Direccion" required="required" pattern="^[a-zA-Z0-9/-,.#]*$" title="Only A to Z and / - . , # allowed." value="<?php echo $address; ?>">
				<br>
				<button type="submit" name="submit" value="submit" class ="button">Guardar
				</button>
			</form>
		</div>

		<div>
			<img class="logo_big" src="images/logo.png" alt="Augusto Mijares Center">
			<p>
				<h2>Centero Augusto Mijares</h2>
			</p>
		</div>
	</div>

	<?php include("templates/footer.php"); ?>

</body>

</html>