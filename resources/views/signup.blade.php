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
	@include("templates/navigation")
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
				@foreach ($errors->all() as $error)
						{{$error}} <br>
				@endforeach
			</div>
			<form action="signup " method="POST">
				@csrf
				<input type="text" id="fname" name="name" placeholder="Nombre de" title="Only alphabets [A to Z] between 1 to 40 characters." onkeyup ="checkname()" value="">
				<input type="email" id="fmail" name="email" placeholder="Correo" onkeyup ="checkemail()" title="Only valid emails" value=""> <!-- http://html5pattern.com/Emails --> <!-- pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" -->
				<br>
				<input type="password" id="fpass" name="pass" placeholder="Contrasena" onkeyup ="checkpass()" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.">
				<input type="password" id="frepass" name="repass" placeholder="Repeter Contrasena" title="Repeat Password." onkeyup ="checkrepass()">
				<br>
				<input type="text" id="faddress" name="address" placeholder="Direccion" title="Only A to Z and / - . , # allowed." value="">
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

	@include("templates.footer")
</body>

</html>