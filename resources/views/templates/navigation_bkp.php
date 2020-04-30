<script>
		function myFunction()
		{
			if (document.getElementById("menu_container").style.display == "none") 
				document.getElementById("menu_container").style.display = "list-item";
			else
				document.getElementById("menu_container").style.display = "none";	
 		}
 	</script>


<div id="navigator">
	<img src="images/logo.png" alt="Augusto Mijares Center">
	<p id="menu" onclick="myFunction()">MENU</p>
	<div id="menu_container">
		<ul>
			<li><a href="/">Inicio</a></li>
			<li><a href="blog/">Blog</a></li>
			<li><a href="about">Semblanza</a></li>
			<li><a href="center">Centro Augusto Mijares</a></li>
			<li><a href="projects">Proyectos</a></li>
			<li><a href="events">Eventos</a></li>
			<li><a href="videos">Videos</a></li>
			<li><a href="team">Equipo</a></li>
			<li><a href="login">Inicio De Sesion</a></li>
			<li><a href="signup">Registro</a></li>
		</ul>
	</div>
</div>